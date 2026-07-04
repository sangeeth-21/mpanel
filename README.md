# mpanel - Stiqr Premium Art & Wall Poster Showcase

A premium showcase website for Stiqr - featuring framed art prints, wall posters, and premium wall decor. Built with CodeIgniter 4, this platform showcases high-quality art products with a modern, interactive UI featuring animated product showcases, detailed product cards, and an immersive browsing experience.

## Project Overview

This project is a premium product showcase website for Stiqr, featuring:
- Interactive product grids with animated showcases
- Premium framed art and wall poster collections
- User authentication system (login/signup with OTP verification)
- Responsive design with modern CSS animations and hover effects
- Product filtering and categorization
- Contact and support forms

## Project Structure

```
mpanel/
├── app/                    # Application core
│   ├── Config/             # Configuration files
│   ├── Controllers/        # Application controllers (Home.php handles all pages)
│   ├── Models/             # Data models (currently using direct DB queries)
│   ├── Views/              # Frontend views
│   │   ├── errors/         # Error pages
│   │   ├── templates/      # Header/footer templates
│   │   ├── about.php       # About page
│   │   ├── careers.php     # Careers page
│   │   ├── home.php        # Homepage with product showcase
│   │   ├── support.php     # Support/contact page
│   │   └── terms.php       # Terms of service
│   └── ...                 # Other standard CI4 directories
├── public/                 # Publicly accessible files
│   ├── assets/             # Product images and assets (mirrored from root assets/)
│   ├── index.php           # Front controller
│   └── ...                 # Other public assets
├── assets/                 # Product showcase images
│   ├── poster_hero.png     # Main hero product
│   ├── poster_cyberpunk.png # Cyberpunk theme poster
│   ├── poster_bauhaus.png   # Bauhaus style poster
│   ├── poster_line_art.png  # Line art poster
│   └── ...                 # Additional product images
├── tests/                  # Test suite
├── writable/               # Writable directories (logs, cache, etc.)
├── .htaccess               # Apache configuration
├── composer.json           # PHP dependencies
└── README.md               # This file
```

## Key Features

### Premium UI/UX Experience
- **Interactive Product Grid**: Dynamic grid layout with featured product showcase
- **Animated Product Cards**: Hover effects, floating animations, and interactive elements
- **Responsive Design**: Optimized for mobile, tablet, and desktop views
- **Modern Visual Design**: Clean, premium aesthetic with smooth transitions
- **Product Showcase Carousel**: Auto-rotating featured products with detailed views

### Product Catalog Showcase
The homepage features a sophisticated product display system:
- **Hero Product Section**: Large featured product with price, discounts, and description
- **Product Categories**: Various art styles (Cyberpunk, Bauhaus, Line Art, etc.)
- **Interactive Cards**: Click-to-view product details with smooth animations
- **Price Display**: Current price, original price, and discount badges
- **Rating & Review System**: Visual star ratings and review counts

### User Authentication System
- Secure user registration with OTP email verification
- Secure login/logout functionality
- Password reset with OTP verification
- Session management
- AJAX-based form submissions for smooth UX

### Additional Pages
- **About Us**: Company information and brand story
- **Careers**: Job openings and career opportunities
- **Support**: Contact form for customer inquiries
- **Terms of Service**: Legal terms and conditions

## Technical Implementation

### Backend (CodeIgniter 4)
- PHP 8.2+ with CodeIgniter 4 framework
- MySQL database for user authentication
- MVC architecture with clean separation of concerns
- RESTful API endpoints for AJAX interactions
- Secure password hashing (bcrypt)
- Input validation and CSRF protection

### Frontend
- HTML5/CSS3 with modern CSS variables and animations
- Vanilla JavaScript for interactive components
- Responsive grid layouts (CSS Grid/Flexbox)
- Product image showcase with hover effects
- Animated transitions and micro-interactions
- Mobile-first responsive design

### Database Structure
The application uses a simple `users` table for authentication:

```sql
CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
);
```

Product data is currently managed through:
- Static image assets in `/assets/` and `/public/assets/`
- Product information embedded in views and JavaScript
- Future enhancement: Product management CMS

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd mpanel
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp env .env
   ```
   Edit `.env` to configure:
   - Base URL
   - Database credentials
   - Email settings (for OTP functionality)

4. **Database migration**
   ```bash
   php spark migrate
   ```

5. **Start development server**
   ```bash
   php spark serve
   ```

## Features in Detail

### Homepage Product Showcase
The homepage features an interactive product grid with:
- **Main Hero Display**: Large featured product with animated presentation
- **Product Categories**: Different art styles showcased in cards
- **Interactive Elements**: Hover effects, click-to-zoom, animated transitions
- **Price Information**: Current pricing, original prices, discount percentages
- **Social Proof**: Review ratings and customer testimonials

### User Experience Flow
1. **Landing**: Visitors see the immersive product showcase
2. **Exploration**: Users can browse different product categories
3. **Interaction**: Hover effects reveal product details and actions
4. **Authentication**: Users can create accounts for personalized experience
5. **Engagement**: Contact forms and social media links for community building

## Security Features
- Password hashing using bcrypt
- CSRF protection on forms
- Input validation and sanitization
- Secure session management
- OTP-based email verification for authentication
- Protected routes for authenticated users only

## Customization

### Adding New Products
1. Add product images to `/assets/` and `/public/assets/`
2. Update the product data in `app/Views/home.php` JavaScript section
3. Add corresponding product cards in the HTML structure
4. Update CSS classes if needed for new product styles

### Styling Customization
- CSS variables defined in `:root` for easy theme customization
- Modify colors, spacing, and animations in the style sections
- Responsive breakpoints defined in media queries

## Contributing
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments
- CodeIgniter 4 framework team
- Product images and designs by Stiqr Design Team
- Open-source community for various frontend animations and effects