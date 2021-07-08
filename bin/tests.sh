#!/bin/bash

# DevOntheRun Test Script

echo "#############################################"
echo "                   Tests                    "
echo "#############################################"

echo "-------------------PHP CS--------------------"
./vendor/bin/phpcs
echo "---------------------------------------------"
echo "-------------------PHP Unit------------------"
./vendor/bin/phpunit
echo "---------------------------------------------"
echo "-------------------PHP Insights--------------"
./vendor/bin/phpinsights --no-interaction --min-quality=90 --min-complexity=85 --min-architecture=90 --min-style=85
echo "-------------------PHP Stan------------------"
./vendor/bin/phpstan analyse src tests --level 7
echo "---------------------------------------------"




