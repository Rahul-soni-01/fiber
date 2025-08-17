This is a Laravel project for managing fiber-related operations. It includes features for streamlined workflows, data management, and reporting.

## Features
- User authentication and authorization.
- CRUD operations for managing data.
- Reporting and analytics.

## Requirements
- PHP >= 8.0
- Composer
- MySQL
- Laravel >= 10

## Installation

1. Clone this repository:
   ```bash
   git clone https://github.com/Rahul-soni-01/fiber.git
   cd fiber

2. Install the dependencies:
   ```bash
    composer install

4. Configure your environment by copying .env.example to .env and updating the database credentials.

5. Import the database using the fiber.sql file.

6. Start the Laravel development server:
    php artisan serve

==================== Project flow ========================
1. LOGIN / AUTHENTICATION
User Roles:
Electric

Cavity

User

Account

Godown

Admin

Permissions: Each role will have specific permissions (e.g., Account in Sale, Purchase).

2. SUPPLIER AND PRODUCT MANAGEMENT
Supplier CRUD:

Add, update, delete, view supplier information.

Product CRUD:

Categories & subcategories for products.

Product Purchase:

Add products from suppliers with stock tracking.

Purchase Return:

Return products to the supplier.

Payment to Supplier:

Manage payments made to suppliers.

3. STOCK FLOW
Purchase Invoice:

If items have a serial number (e.g., LD-45, LD-30), they must be added first.

Invoice Stock Selection:

Select stock from old/new invoices being used on Fiber.

Stock Report:

Track and report on total purchase quantity, stock quantity, unused stock, dead stock, serial numbers, etc.

Stock Types CRUD:

Manage different types (e.g., 15, 18, 21, 25).

4. MANUFACTURING PRODUCT/REPORT FLOW
Electric/Cavity Users:

Add data for respective product manufacturing.

Account Verification:

Account user verifies or rejects a report.

Product Status Post-Verification:

After verification, the product is available in the main store and is ready for sale.

5. CUSTOMER AND SALES MANAGEMENT
Customer CRUD:

Manage customer data.

Demo Products:

Assign demo products to customers.

Manage demo return and demo-to-sale process.

Direct Sale:

Manage direct product sales to customers.

Customer Payment:

Receive customer payments.

Product Return for Repair:

Manage product repairs and returns.

6. REPORT MANAGEMENT
Report Layout CRUD:

Admin assigns which fields to show for specific users.

Section Management:

Manage different sections such as Mainstore, Manufacture, Repair, Bed Desk, and Sell.

7. GST PDF MANAGEMENT
GST PDF CRUD:

Manage GST-related reports in PDF format.

8. BANK MANAGEMENT
Bank CRUD:

Manage bank information.

Customer Payment Credit:

Record customer payment credits.

Supplier Payment Debit:

Record supplier payment debits.

Expense Debit:

Record various expenses.

9. WEB SETTINGS
Company Information:

Manage company name, address, logo, and other settings.

