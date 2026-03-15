# La Verdad Herald - Full Stack Application

Complete news platform with React Native mobile app and Laravel backend.

## Project Structure

```
.
├── laverdad-herald-mobile-app/    # React Native mobile application
│   ├── src/
│   │   ├── config/                # API configuration
│   │   ├── services/              # API services
│   │   ├── context/               # React Context
│   │   └── utils/                 # Utilities
│   ├── .env                       # Environment variables
│   └── package.json
│
└── backend/                       # Laravel PHP backend
    ├── app/                       # Application code
    ├── routes/                    # API routes
    ├── database/                  # Migrations & seeders
    ├── .env                       # Backend environment
    └── composer.json
```

## Quick Start

### 1. Backend Setup

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Backend will run at `http://localhost:8000`

### 2. Mobile App Setup

```bash
cd laverdad-herald-mobile-app
npm install
cp .env.example .env
npm start
```

### 3. Run Both Together

From the mobile app directory:
```bash
npm run dev
```

## Features

### Mobile App
- News browsing and search
- User authentication
- Article likes and sharing
- Category filtering
- Newsletter subscription
- Contact forms

### Backend API
- RESTful API with Laravel
- JWT authentication with Sanctum
- Article management
- User roles (Admin, Moderator, Author)
- Email verification
- Cloudinary media storage
- Rate limiting

## Environment Configuration

### Mobile App (.env)
```
API_URL=http://localhost:8000/api
APP_NAME=La Verdad Herald
```

### Backend (.env)
See `backend/.env.example` for complete configuration including:
- Database settings
- Mail configuration (Brevo)
- Cloudinary settings
- App keys

## Documentation

- [Mobile App README](./laverdad-herald-mobile-app/README.md)
- [Backend API Routes](./backend/routes/api.php)

## Tech Stack

### Mobile
- React Native
- Expo
- React Navigation
- Axios
- AsyncStorage

### Backend
- Laravel 11
- PHP 8.1+
- MySQL/SQLite
- Sanctum (Auth)
- Cloudinary (Media)

## Development

### Mobile App Scripts
- `npm start` - Start Expo dev server
- `npm run android` - Run on Android
- `npm run ios` - Run on iOS
- `npm run web` - Run in browser

### Backend Scripts
- `php artisan serve` - Start dev server
- `php artisan migrate` - Run migrations
- `php artisan test` - Run tests

## License

Private
