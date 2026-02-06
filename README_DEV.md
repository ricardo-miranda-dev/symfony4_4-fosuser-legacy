# Guía de Desarrollo – Symfony 4.4 FOS

Este documento describe el flujo técnico de desarrollo del proyecto,
especialmente el manejo de dependencias y assets con Webpack Encore.

---

## Requerimientos del Proyecto

Las siguientes versiones han sido utilizadas y probadas para el correcto
funcionamiento del sistema.

### Backend

- **PHP**: 7.4.4  
- **Symfony**: 4.4.x (LTS)
- **Composer**: 2.2.26

### Servidor Local

- **XAMPP**: 7.4.x
  - Apache
  - PHP 7.4.4
  - MySQL / MariaDB

* El proyecto fue desarrollado y probado utilizando XAMPP como entorno local.

---

### Frontend / Assets

- **Node.js**: 20.x LTS
- **npm**: 10.x
- **Webpack Encore**: (incluido vía Symfony)

* Node.js es requerido únicamente para la compilación de assets  
* No es necesario Node.js en entornos donde no se modifiquen JS / CSS

---

## Entornos de trabajo

### Windows 8
- Uso principal: Backend (PHP, Symfony, Twig)
- No se compilan assets
- No requiere Node / npm

### Windows 10
- Entorno completo
- Compilación de assets con Webpack Encore
- Node.js LTS instalado

---

## Dependencias PHP

### Instalar dependencias
Ejecutar solo si:
- Cambia `composer.json`
- Cambia `composer.lock`

---

### Notas Importantes

- La carpeta `public/build/` **no se versiona**
- El archivo `manifest.json` se genera mediante:
  npm run dev

```bash
composer install
npm run dev
