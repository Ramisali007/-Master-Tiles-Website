
## 🏢 Master Tiles – Premium Tile Company Website


Master Tiles is a fully functional, responsive, and dynamic website designed for a premium tile company. This website allows visitors to explore tile collections, request custom product quotes, and contact the company directly. The site also includes a basic admin panel for managing customer interactions.

---

## 🌟 Key Features

- ✅ **Modern, Clean UI** with smooth animations and hover effects
- ✅ **Fully Responsive Design** (mobile, tablet, and desktop)
- ✅ **Product Showcase Gallery** with categories: Ceramic, Porcelain, Marble, Mosaic
- ✅ **Quote Request Form** (data saved to MySQL database)
- ✅ **Contact Us Form** (with backend PHP validation)
- ✅ **Admin Panel** to view customer messages and quote requests

---

## 🧰 Technologies Used

### Frontend:
- `HTML5`, `CSS3`
- `JavaScript` (optional enhancements)
- Responsive Web Design using Flexbox & Media Queries

### Backend:
- `PHP`
- `MySQL` (with phpMyAdmin for database management)

### Tools:
- `XAMPP` for local server environment
- `VS Code` / `Dreamweaver` for editing

---

## 📂 Project Structure

```

master-tiles/
├── assets/
│   ├── css/
│   │   └── style.css            # Main stylesheet
│   ├── images/
│   │   └── (logos, banners, tiles)
│   └── js/
│       └── (optional animations/scripts)
├── includes/
│   ├── header.php               # Reusable header
│   └── footer.php               # Reusable footer
├── about.php                    # About the company
├── admin.php                    # Admin dashboard
├── contact.php                  # Contact form
├── create\_tables.sql            # SQL for DB setup
├── db.php                       # Database connection
├── index.php                    # Home page
├── products.php                 # Product gallery
├── quote.php                    # Quote form
└── thankyou.php                 # Confirmation page

````

---

## ⚙️ Installation & Setup Guide

### 📌 Prerequisites:
- XAMPP or any local server with Apache & MySQL
- A web browser (Chrome, Firefox, etc.)

### 🔧 Installation Steps:

1. Clone or download the repository:
    ```
[    https://github.com/your-username/master-tiles.git
](https://github.com/Ramisali007/-Master-Tiles-Website)    ```

2. Move the folder to your XAMPP `htdocs` directory:
    ```
    C:\xampp\htdocs\Mastertiles\
    ```

3. Start **Apache** and **MySQL** from XAMPP Control Panel.

4. Import the database:
    - Go to [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
    - Create a new database named `mastertiles`
    - Import the `create_tables.sql` file

5. Visit your site at:
    ```
    http://localhost/Mastertiles/
    ```

---

## 🗃️ Database Schema

### Database Name: `mastertiles`

```sql
CREATE TABLE quotes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    product VARCHAR(100),
    quantity INT,
    total_price DECIMAL(10,2),
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
````

---

## 📄 Pages Overview

| Page           | Description                                             |
| -------------- | ------------------------------------------------------- |
| `index.php`    | Landing page with welcome message and featured products |
| `about.php`    | Company background, mission, and team information       |
| `products.php` | Displays product categories and image gallery           |
| `quote.php`    | Allows users to submit a quote request                  |
| `contact.php`  | Contact form to send a message or inquiry               |
| `admin.php`    | Backend dashboard to view submitted quotes and messages |
| `thankyou.php` | Confirmation message after form submissions             |

---

## 🎨 Customization Guide

* 🔧 Update branding, logo and colors in `style.css`
* 🖼 Replace sample product images in `assets/images/`
* ✏️ Edit content (company name, description, etc.) in HTML/PHP files
* 📤 Add new features such as login, product filters, or email notifications

---

## 📸 Suggested Screenshots (for GitHub)

* Homepage layout
* Product gallery
* Quote form
* Admin panel
* Responsive view on mobile/tablet

---

## 📌 Future Improvements

* Add admin login with authentication
* Add product search & filter system
* Implement image upload system for products
* Send email confirmation for quotes and contact forms

---

## 👥 Authors

* Ibraheem
* Makki
* Ramis Ali
* \[Add others if applicable]

---

## 📜 License

This project is open-source and available under the **MIT License**. Feel free to use and modify it for learning purposes.

---

## 📬 Contact

For project inquiries or contributions, contact us at:

```
📧 your-email@example.com
🌐 www.mastertiles.com
```

```

---


