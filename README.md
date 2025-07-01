# Sunny Portal Connect WordPress Plugin

**Connect your Sunny Portal microgrid data directly to your WordPress site with ease.**

---

## Description

Sunny Portal Connect enables microgrid owners to integrate, explore, and display telemetry data from their SMA Sunny Portal solar setups on WordPress websites. Users can create “Channels” in the admin panel—each representing a connection to a microgrid or subsystem—and dynamically choose what live telemetry data to display on any page or post via shortcodes or blocks.

This plugin aims to empower small businesses, remote communities, and organizations to showcase their renewable energy usage and carbon footprint savings without requiring every visitor to have a Sunny Portal account. Future features may include automatic social media updates and deeper subsystem integration.

---

## Target Users & Use Cases

- **Small businesses and remote communities** showcasing their green energy impact as part of their brand image.  
- **Community administration websites** allowing members to monitor microgrid status transparently.  
- Users wanting to display **carbon footprint offset** based on UK standards alongside live telemetry.  
- Site owners interested in sharing renewable energy data **without requiring Sunny Portal logins** for viewers.

---

## Features & Roadmap

### Initial Features
- Admin panel for creating and managing Channels that connect to Sunny Portal microgrids.
- Dynamic, user-friendly dropdown menus to explore and select telemetry data points.
- Shortcodes or Gutenberg blocks to embed live telemetry displays on any page/post.
- Basic “display objects” for presenting channel data (tables, simple forms).

### Future Enhancements
- Expand channel support to all microgrid subsystems.
- Add carbon footprint offset calculations and visualization.
- Implement auto-posting of status updates to social media platforms.
- Advanced customization options for display styles and layouts.

---

## Installation & Setup

1. Download the latest release ZIP from the [GitHub repository](https://github.com/yourusername/sp-connect).  
2. In your WordPress admin, go to **Plugins > Add New > Upload Plugin** and upload the ZIP file.  
3. Activate the plugin.  
4. Navigate to the new **Sunny Portal Connect** menu in the admin dashboard.  
5. Enter your Sunny Portal API credentials and configure your microgrid Channels.  
6. Create display objects for each Channel and add them to pages or posts using the provided shortcodes or Gutenberg blocks.  

*Detailed documentation on channel creation and display embedding will be provided in future updates.*

---

## Development Environment Setup

We recommend the following setup for local development and contributions:

- **Docker:** Use Docker containers for a consistent WordPress and PHP environment.  
- **Composer:** Manage PHP dependencies and autoloading with Composer.  
- **WordPress Version:** Compatible with WordPress 6.0 and above.  
- **PHP Version:** Requires PHP 7.4 or higher.  
- **Code Standards:** Follow [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).  
- **Debugging:** Enable WP_DEBUG during development for detailed error reporting.  

You can find a sample `docker-compose.yml` and Composer setup in the `/dev` directory of the repo to get started quickly.

---

## Contribution Guidelines

We welcome contributions! To keep the project healthy and organized:

- Please fork the repo and work on feature branches from your fork.  
- Submit pull requests (PRs) against the `main` branch with clear descriptions of your changes.  
- Open issues to propose ideas, report bugs, or request features—use the issue templates provided.  
- Follow the existing code style and include documentation for new features.  
- We will review PRs promptly and provide feedback as needed.  

---

## Support

If you encounter issues or have questions:

- Check the [GitHub issues](https://github.com/yourusername/sp-connect/issues) page for existing discussions.  
- Open a new issue if your problem or question isn’t addressed.  
- For general inquiries, you can reach out via the repo’s discussion board or contact the maintainer directly (contact info TBD).

---

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

---

*Sunny Portal Connect* is an open-source effort to bridge the gap between solar microgrid telemetry and WordPress websites, helping communities and businesses share their renewable energy impact effortlessly.

---

*Developed by Danni Douglas — [meetdanni.com](https://meetdanni.com)*
