<?php
/**
 * Created by PhpStorm.
 * User: delamare
 * Date: 08/09/2019
 * Time: 21:48
 */

namespace AppBundle\Service\Scorenco;


use AppBundle\Model\Scorenco\Championnat;
use AppBundle\Model\Scorenco\Equipe;
use AppBundle\Model\Scorenco\Journee;
use AppBundle\Model\Scorenco\Match;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ScorencoService
{
    public function getJourneeByUrl($url){
        $client = new Client();
        $response = $client->get($url);

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        /** @var Championnat $championnat */
        $championnat = $serializer->deserialize($response->getBody(), Championnat::class, 'json');

        $journees = [];
        /** @var Journee $round */
        foreach($championnat->getRounds() as $round){
            /** @var Journee $journee */
            $journee = $serializer->deserialize(json_encode($round), Journee::class, 'json');
            $matchs = [];
            /** @var Match $event */
            foreach ($journee->getEvents() as $event){
                /** @var Match $match */
                $match = $serializer->deserialize(json_encode($event), Match::class, 'json');
                $equipes = [];
                foreach ($match->getTeams() as $team){
                    $equipes[] = $serializer->deserialize(json_encode($team), Equipe::class, 'json');
                }
                $match->setTeams($equipes);
                $matchs[] = $match;
            }
            $journee->setEvents($matchs);
            $journees[] = $journee;
        }
        $championnat->setRounds($journees);

        return $championnat;
    }

}