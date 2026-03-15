# La Verdad Herald Mobile App - Folder Structure

## Project Structure

```
/src
├── /api                    # API integration layer
│   └── /services          # API service modules
├── /components            # Reusable React components
│   ├── /common           # Common/shared components
│   └── /articles         # Article-specific components
├── /screens              # Screen/page components
│   ├── /home            # Home screen
│   ├── /articles        # Article screens
│   └── /auth            # Authentication screens
├── /navigation           # Navigation configuration
├── /utils               # Utility functions and helpers
├── /styles              # Global styles and themes
└── /assets              # Static assets
    └── /images          # Image files
```

## Folder Descriptions

- **api/**: Contains all API-related code for backend communication
  - **services/**: Individual service modules for different API endpoints

- **components/**: Reusable UI components
  - **common/**: Shared components used across the app
  - **articles/**: Components specific to article display and interaction

- **screens/**: Full-screen components representing app pages
  - **home/**: Home screen components
  - **articles/**: Article listing and detail screens
  - **auth/**: Login, signup, and authentication screens

- **navigation/**: React Navigation setup and configuration

- **utils/**: Helper functions, constants, and utilities

- **styles/**: Global styles, themes, and style utilities

- **assets/**: Static files
  - **images/**: Image assets for the app
