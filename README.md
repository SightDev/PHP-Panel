## STILL A W.I.P, Kind of a mess as of now.
# Enhanced PHP Panel with Advanced Loader Management

Contributions welcome! 💻 Feel free to submit pull requests.

This project builds upon a pre-made PHP [panel](https://github.com/znixbtw/php-panel-v2), introducing a more user-friendly and efficient API, along with several key improvements for better administration and usability.
🔹 Features & Improvements

    Revamped API – Simplified and more intuitive API for seamless interactions.
    Loader Management Section – A dedicated admin-only section to control the loader efficiently.
    Maintenance Mode – Automatically disables loader downloads when the software is under maintenance or down.
    Color Scheme Update – A refreshed UI with an improved color scheme for better visual clarity.
    General Enhancements – Various optimizations and refinements scattered throughout the panel.

# 🔒 Access Control

    The loader management section is restricted to admin users only to ensure security and control. 
    When using the api use aapi.php instead of api.php.

This project enhances the original panel’s functionality while maintaining ease of use and accessibility for administrators. 🚀

# ⚡ Overview of api


<img src="https://camo.githubusercontent.com/f59b9bc008b9c10dd52467bb899ebadf9bd0564cd5bcf21452997ea2a361943f/68747470733a2f2f692e696d6775722e636f6d2f56423269616c382e706e67"/>

## Pros and cons of this approach

Pros: User isn't interacting with the DB directly, MVC Pattern Indication, and Defined Data Flow

Cons: Scalability and Performance Considerations (runs perfectly fine on most low grade servers), Single Point of Failure (Potentially), No External System Integration.
