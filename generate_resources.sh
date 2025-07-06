#!/bin/bash

# List of resource names
resources=(
  general_settings main_banners service_categories sub_service_categories
  service_sections service_provided_quantities motivations scrolling_headings
  why_chooses facilities service_price_packages packages companies case_stadies
  customer_reviews blogs mails footer_banners my_company_page_banners about_us
  authors comments service_images frequently_ask_questions workers products
)

for resource in "${resources[@]}"
do
  # Format names
  snake_case=$(echo "$resource" | tr '[:upper:]' '[:lower:]')
  camel_case=$(echo "$resource" | sed -E 's/(^|_)([a-z])/\U\2/g')
  kebab_case=$(echo "$resource" | sed 's/_/-/g')

  echo "Creating for: $camel_case"

  # 1. Model with Migration
  php artisan make:model "$camel_case" -m

  # 2. Controller in Admin folder
  php artisan make:controller "Admin/${camel_case}Controller"

  # 3. Form Request
  php artisan make:request "${camel_case}Request"

  # 4. Service folder + file
  mkdir -p "app/Services/${camel_case}"
  touch "app/Services/${camel_case}/${camel_case}Service.php"

  # Add boilerplate in service file
  echo "<?php

namespace App\Services\\${camel_case};

class ${camel_case}Service
{
    // Add service methods here
}
" > "app/Services/${camel_case}/${camel_case}Service.php"

done
