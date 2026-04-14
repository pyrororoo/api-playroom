# API Playroom

Sample REST API for users and pets using PHP + MySQL.

## Run With Docker (same pattern as `learningfullstack`)

1. From `api-playroom`, start services:
   ```bash
   docker compose up --build
   ```
2. Open the local interface:
   - App: http://localhost:8080
   - phpMyAdmin: http://localhost:8081

The DB is initialized automatically from `src/database/user_system.2.sql`.

## API Endpoints

- `GET /api/getusers.php`
- `GET /api/getuser.php?id=<id>`

## Stop Services

```bash
docker compose down
```

To also remove DB data volume:

```bash
docker compose down -v
```

## Project Structure

```text
api-playroom/
|-- doc/
|-- src/
|   |-- api/
|   |-- core/
|   |-- database/
|   |-- include/
|   `-- index.html
|-- Dockerfile
|-- docker-compose.yml
|-- docker-compose.override.yml
|-- .env
`-- README.md
```
