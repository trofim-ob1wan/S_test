<?php

namespace App\DataFixtures;
use App\Entity\Client;
use App\Entity\Education;
use App\Entity\Scoring;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;


class ClientFixture extends Fixture
{
    protected $faker;

    public function load(ObjectManager $manager)
    {
        $this->faker = Factory::create();

        $educations =[
            'Middle education',
            'Special education',
            'High education'
        ];

        for ($i = 0; $i < 50; $i++) {

            $client = new Client();
            $scoring = new Scoring();
            $education = new Education();

            $scoring->setBalls($this->faker->numberBetween($min = 10, $max = 35));

            $client->setName($this->faker->name);
            $client->setFname($this->faker->lastName);
            $client->setEmail($this->faker->freeEmail);
            $client->setPhone($this->faker->e164PhoneNumber);
            $client->setUserDataProcessing(rand(0, 1));
            $client->setScoring($scoring);
            $education->setEducation($this->faker->randomElement($educations));
            $client->addEducation($education);

            $manager->persist($client);
        }

        $manager->flush();
    }
}
