# Interface Overview

This project uses [Tailwind CSS](https://tailwindcss.com/) and the default Laravel Blade layouts to render the user interface.

## Category Management Screens

- **List Categories** (`resources/views/categories/index.blade.php`)
  - Displays existing categories in a table.
  - Provides links to edit or delete each record.
  - Includes a button to add a new category.

- **Create Category** (`resources/views/categories/create.blade.php`)
  - Simple form to enter `name`, `slug`, and select a parent category.
  - Uses the built-in Blade components for labels, inputs and buttons.

- **Edit Category** (`resources/views/categories/edit.blade.php`)
  - Similar to the create form but pre-fills the current values.
  - Allows changing the parent category or clearing it.

These pages extend `x-app-layout` so navigation and global styles are shared across the site. Images for products or banners should be placed in `public/storage` or an external CDN as desired.
