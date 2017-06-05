<?php
namespace Psi\AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class StaticDataUpdateCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('psi:static:update')
            ->setDescription('Updates static data cache from remote source..')
            ->setHelp('Regenerates the static data cache in DB from remote source.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->getContainer()->get('psi.app.provider.static.data.provider');

        $output->writeln("Fetching static data: champion");
        $manager->fetchStaticData("champion");
        $output->writeln("Fetching static data: rune");
        $manager->fetchStaticData("rune");
        $output->writeln("Fetching static data: mastery");
        $manager->fetchStaticData("mastery");
        $output->writeln("Fetching static data: summoner");
        $manager->fetchStaticData("summoner");
        $output->writeln("Fetching static data: profileicon");
        $manager->fetchStaticData("profileicon");
    }
}
