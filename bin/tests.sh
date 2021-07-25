#!/bin/bash

# DevOntheRun Test Script

echo "#############################################"
echo "                   Tests                    "
echo "#############################################"

TEST_FAILED_MSG="The test failed, fix your code & try again =)"

echo ""
echo "---------------------------------------------"
echo "                   PHPUnit"
echo "---------------------------------------------"

{ docker-compose exec php ./vendor/bin/phpunit --no-interaction || { echo -e "\u274c $TEST_FAILED_MSG" ; exit 1; } } \
&& echo "" && echo -e "\xE2\x9C\x94 PHPUnit passed"

echo ""
echo "---------------------------------------------"
echo "                   PHPCS"
echo "---------------------------------------------"
{ docker-compose exec php ./vendor/bin/phpcs  || { echo -e "\u274c $TEST_FAILED_MSG" ; exit 1; } } \
&& echo "" && echo -e "\xE2\x9C\x94 PHPCS passed"

echo ""
echo "---------------------------------------------"
echo "                   PHPStan"
echo "---------------------------------------------"
{ docker-compose exec php ./vendor/bin/phpstan analyse src tests --level 7  --memory-limit=2G  || { echo -e "\u274c $TEST_FAILED_MSG" ; exit 1; } } \
&& echo "" && echo -e "\xE2\x9C\x94 PHPStan passed"

echo ""
echo "---------------------------------------------"
echo "                   PHP Insights"
echo "---------------------------------------------"
{ docker-compose exec php ./vendor/bin/phpinsights --no-interaction --min-quality=90 --min-complexity=85 --min-architecture=90 --min-style=85  || { echo -e "\u274c $TEST_FAILED_MSG" ; exit 1; } } \
&& echo "" && echo -e "\xE2\x9C\x94 PHP Insights passed"

echo ""
echo "---------------------------------------------"
echo -e "                   \xE2\x9C\x94 ALL TESTS PASSED"
echo "---------------------------------------------"




