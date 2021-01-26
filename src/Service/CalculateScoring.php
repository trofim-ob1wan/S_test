<?php

namespace App\Service;

class CalculateScoring
{
    public function scoring($client)
    {
        $result = [];
        $email = $this->getEmailBall($client->getEmail(), $result);
        $phone = $this->getPhoneBall($client->getPhone(), $result);
        $userDataProcessing = $this->getUserDataProcessingBall($client->getUserDataProcessing(), $result);
        $education = $this->getEducationsBall($client->getEducations(), $result);

        if (empty($education)){
            throw new \Exception('Ни одно образование не выбранно!');
        }
        $education = ["education" => array_sum(call_user_func_array('array_merge',$education))];

        $result = array_merge($email, $phone, $userDataProcessing, $education);

        return $result;
    }

    public function getEmailBall($email, $result)
    {
        $patternGmail = '/\@{1}gmail{1}\.com$/';

        $patternYandex = '/\@{1}yandex{1}\.(ru|com|by|kz|ua)/';

        $patternMail = '/\@{1}mail{1}\.ru/';

        if (preg_match($patternGmail, $email, $mail) === 1) {
            $result += ["patternMail" => 10];
        } elseif (preg_match($patternYandex, $email, $mail) === 1) {
            $result += ["patternMail" => 8];
        } elseif (preg_match($patternMail, $email, $mail) === 1) {
            $result += ["patternMail" => 5];
        } else {
            $result += ["patternMail" => 3];
        }

        return $result;
    }

    public function getPhoneBall($phone, $result)
    {
        $patternMtc = '/^(8|\+7)(983|913)/';

        $patternMegafon = '/^(8|\+7)(923|929|933|999)/';

        $patternBilain = '/^(8|\+7)(903|905|906|909|960|961|962|963|964|967)/';

        if (preg_match($patternMtc, $phone, $phones) === 1) {
            $result += ["patternPhone" => 3];
        } elseif (preg_match($patternMegafon, $phone, $phones) === 1) {
            $result += ["patternPhone" => 10];
        } elseif (preg_match($patternBilain, $phone, $phones) === 1) {
            $result += ["patternPhone" => 5];
        } else {
            $result += ["patternPhone" => 1];
        }
        return $result;

    }

    public function getUserDataProcessingBall($userDataProcessing, $result)
    {
        if ($userDataProcessing === true || $userDataProcessing == 1) {
            $result += ["dataProcessing" => 4];
        } else {
            $result += ["dataProcessing" => 0];
        }

        return $result;
    }

    public function getEducationsBall($educations, $result)
    {
        foreach ($educations as $item) {
            if ($item->getEducation() === 'Middle education') {
                $result[$item->getEducation()][] = 5;
            } elseif ($item->getEducation() === 'Special education') {
                $result[$item->getEducation()][] = 10;
            } else {
                $result[$item->getEducation()][] = 15;
            }
        }
        return $result;
    }
}
