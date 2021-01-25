<?php

namespace App\Command;

use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Service\CalculateScoring;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ScoringCommand extends Command
{
    protected static $defaultName = 'app:scoring';
    private $entityManager;
    private $calculateScoring;
    private $clientRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        CalculateScoring $calculateScoring,
        ClientRepository $clientRepository
    )
    {
        $this->entityManager = $entityManager;
        $this->clientRepository = $clientRepository;
        $this->calculateScoring = $calculateScoring;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Calculate scoring')
            ->setHelp('Calculate scoring for all clients, calculate the scoring of one client by "id"');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->entityManager->getRepository(Client::class);

        $question = $io->confirm('Calculate scoring for ALL clients?');

        if ($question) {
            $clientList = $this->clientRepository->findAll();

            foreach ($clientList as $client) {
                $this->outputConsoleData($io, $client);
            }
        } else {
            $idClient = $io->ask('Enter Client id', 0, function ($id) {
                $client = $this->clientRepository->findOneBy(['id' => $id]);
                if (!$client) {
                    throw new \RuntimeException('Client not found with id:' . $id);
                }
                return $id;
            });

            if ($idClient) {
                $SingleClient = $this->clientRepository->findOneBy(['id' => $idClient]);
                $this->outputConsoleData($io, $SingleClient);
            }
        }
        return 0;
    }

    public function outputConsoleData($io, $client)
    {
        $result = $this->calculateScoring->scoring($client);

        if ($client->getUserDataProcessing() == 1) {
            $DataProcessing = 'I give my consent to the processing of my data';
        } else {
            $DataProcessing = 'I do not give my consent to the processing of my data';
        }

        $mass = [];
        $education = $this->calculateScoring->getEducationsBall($client->getEducations(), $mass);

        $io->title('Client id: ' . $client->getId());
        $io->table(
            array('#', 'Client data', 'Balls'),
            array(
                array('Name:', $client->getName(), '0'),
                array('Fname:', $client->getFname(), '0'),
                array('Phone:', $client->getPhone(), $result['patternPhone']),
                array('Mail:', $client->getEmail(), $result['patternMail']),
                array('dataProcessing:', $DataProcessing, $result['dataProcessing']),
                array('', '', ''),
            )
        );

        foreach ($education as $key => $value) {
            $sum = array_sum($value);
            $io->table(
                array('#', 'Client data', 'Balls'),
                array(
                    array('Education:', $key, $sum),
                )
            );
        }
        $io->success('Scoring: ' . $client->getScoring()->getBalls());
        $io->newLine(2);
    }
}
