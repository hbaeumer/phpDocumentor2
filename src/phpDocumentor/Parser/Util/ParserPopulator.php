<?php

namespace phpDocumentor\Parser\Util;

use phpDocumentor\Command\Helper\ConfigurationHelper;
use phpDocumentor\Parser\Parser;
use Symfony\Component\Console\Input\InputInterface;

class ParserPopulator
{
    public function populate(
        Parser $parser,
        InputInterface $input,
        ConfigurationHelper $configurationHelper
    ) {
        $parser->setForced($input->getOption('force'));
        $parser->setEncoding($configurationHelper->getOption($input, 'encoding', 'parser/encoding'));
        $parser->setMarkers(
            $configurationHelper->getOption(
                $input,
                'markers',
                'parser/markers',
                ['TODO', 'FIXME'],
                true
            )
        );
        $parser->setIgnoredTags($input->getOption('ignore-tags'));
        $parser->setValidate($input->getOption('validate'));
        $parser->setDefaultPackageName(
            $configurationHelper->getOption($input, 'defaultpackagename', 'parser/default-package-name')
        );
    }
}
