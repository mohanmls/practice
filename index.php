<?php
require_once 'vendor/autoload.php';
use Cocur\Domain\Connection\ConnectionFactory;
use Cocur\Domain\Data\DataLoader;
use Cocur\Domain\Whois\Client as WhoisClient;
use Cocur\Domain\Availability\Client as AvailabilityClient;

$factory = new ConnectionFactory();
$dataLoader = new DataLoader();
$data = $dataLoader->load(__DIR__.'/data/tld.json');

$client = new WhoisClient($factory, $data);
$domainName = 'geteasyDomain.com';
echo "<pre>".$client->query($domainName);echo "</pre>";

$whoisClient = new WhoisClient($factory, $data);
$client = new AvailabilityClient($whoisClient, $data);

echo $client->isAvailable($domainName);