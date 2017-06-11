<?php
// Stefan Erakovic 3086/2016
namespace Psi\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class StaticDataFilesUpdateCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('psi:static:file:update')
            ->setDescription('Updates static image files from remote source..')
            ->setHelp('Regenerates the static image cache in file system from remote source.');
    }

    private function getFilesFromRequest(OutputInterface $output, $namespace,$apiRequest, $version = "7.11.1")
    {
        static $manager = null;
        if (!$manager) {
            $manager = $this->getContainer()->get('psi.app.manager.static.file.manager');
        }

        $apiRequest->sendRequest();
        $apiResponse = $apiRequest->getResponse();
        $apiData = $apiResponse->getData();

        foreach ($apiData['data'] as $champData) {
            $pull = "http://ddragon.leagueoflegends.com/cdn/$version/img/$namespace";
            $imgUrl = $pull . "/" . $champData['image']['full'];
            $manager->putFile($namespace, $champData['id'] . ".png", $imgUrl);
            
            $output->writeln("Fetched static file: " . $champData['image']['full']);
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $factory = $this->getContainer()->get('psi.app.request.factory');

        $requests = [
            'champion' => $factory->createStaticDataChampionsRequest([]),
            'rune' => $factory->createStaticDataRunesRequest([]),
            'mastery' => $factory->createStaticDataMasteriesRequest([]),
            'spell' => $factory->createStaticDataSummonerSpellsRequest([]),
            'profileicon' => $factory->createStaticDataProfileIconsRequest([])
        ];

        foreach ($requests as $namespace => $request) {
            $output->writeln("Fetching static file: $namespace");
            $this->getFilesFromRequest($output, $namespace, $request);
        }
    }
}
