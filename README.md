#  PerfumesPTL — Laboratorio de SQL Injection

> Trabajo de Fin de Grado — Universidad Alfonso X el Sabio  
> **Pedro Alonso Tapia Lobo**  
> Diseño e implementación de un laboratorio de ciberseguridad para el análisis y mitigación de ataques en redes corporativas.

---

##  Descripción

Aplicación web construida desde cero para demostrar en un entorno controlado cómo funciona un ataque de **SQL Injection**, cuál es su impacto real y cómo mitigarlo correctamente.

La aplicación simula una tienda de perfumes con panel de administración, dos versiones diferenciadas — vulnerable y segura — y soporte para herramientas de pentesting como SQLMap.

---

##  Capturas

### Pantalla de inicio
![Inicio](docs/inicio.png)

### Versión vulnerable — Login
![Login vulnerable](docs/login_vulnerable.png)

### Versión segura — Detección de ataque
![Detección](docs/login_seguro.png)

### Tienda de productos
![Tienda](docs/tienda.png)

---

##  Estructura del proyecto
sqli-demo/
├── docker-compose.yml
├── sql/
│   ├── init.sql              # Base de datos vulnerable
│   └── init_seguro.sql       # Tabla con contraseñas hasheadas
└── src/
├── inicio.php            # Pantalla de selección
├── registrar.php         # Genera usuarios con bcrypt
├── css/                  # Estilos
├── img/                  # Imágenes de productos
├── vulnerable/           # Versión vulnerable a SQLi
│   ├── index.php
│   ├── login.php
│   ├── tienda.php
│   ├── admin.php
│   └── actualizar.php
└── seguro/               # Versión protegida
├── index_seguro.php
└── login_seguro.php

---

##  Tecnologías

- **PHP 8.1** con Apache
- **MySQL 8.0**
- **Docker** y Docker Compose
- **SQLMap** para pentesting automatizado

---

##  Cómo ejecutar

### Requisitos
- Docker Desktop instalado

### Pasos

```bash
# 1. Clonar el repositorio
git clone https://github.com/Tapiiaa/sqli-demo.git
cd sqli-demo

# 2. Levantar los contenedores
docker-compose up

# 3. Registrar usuarios seguros (solo la primera vez)
# Abrir en el navegador:
http://localhost:8080/registrar.php

# 4. Acceder a la aplicación
http://localhost:8080/inicio.php
```

---

##  Ataques demostrados

### Bypass total de autenticación
Usuario: ' OR '1'='1' -- -
Contraseña: (vacía)

### Bypass dirigido a admin
Usuario: admin' -- -
Contraseña: (vacía)

### Volcado completo de la base de datos con SQLMap
```bash
docker run --rm -it secsi/sqlmap \
  -u "http://host.docker.internal:8080/vulnerable/index.php" \
  --data="username=admin&password=test" \
  -D demo -T users --dump
```

---

##  Mitigaciones implementadas

| Vulnerabilidad | Solución aplicada |
|---|---|
| SQL Injection | Prepared statements con `mysqli::prepare()` |
| Contraseñas en texto plano | Hashing con `bcrypt` via `password_hash()` |
| Detección de ataques | Filtrado de patrones maliciosos en el input |

---

##  Credenciales de prueba

| Usuario | Contraseña | Rol |
|---|---|---|
| admin | contraseniasecreta123 | Administrador |
| Pedro | pedro123 | Usuario |
| Claudia | claudia123 | Usuario |
| Patrik | patrik123 | Usuario |

---

##  Aviso legal

Este proyecto ha sido desarrollado exclusivamente con fines educativos en un entorno controlado. El uso de estas técnicas contra sistemas sin autorización explícita es ilegal.