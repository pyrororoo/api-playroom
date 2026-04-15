# API Playroom TODO

Roadmap for populating and stabilizing the API project before/while shipping to branch.

## 1. API Design and Standards
- [ ] Define final endpoint list for `users` and `pets`.
- [ ] Standardize response shape for success and error payloads.
- [ ] Standardize HTTP status code usage (`200`, `201`, `400`, `404`, `500`).
- [ ] Add method checks per endpoint (reject invalid HTTP methods).

## 2. Users API Completion
- [x] `GET /api/getusers.php`
- [x] `GET /api/getuser.php?id=<id>`
- [ ] `POST /api/createuser.php`
- [ ] `PUT/PATCH /api/updateuser.php?id=<id>`
- [ ] `DELETE /api/deleteuser.php?id=<id>`
- [ ] Validate `username`, `display_name`, and `password` constraints.
- [ ] Hash password on create/update.

## 3. Pets API Completion
- [ ] `GET /api/getpets.php`
- [ ] `GET /api/getpet.php?id=<id>`
- [ ] `POST /api/createpet.php`
- [ ] `PUT/PATCH /api/updatepet.php?id=<id>`
- [ ] `DELETE /api/deletepet.php?id=<id>`
- [ ] Validate `pet_name`, `pet_type`, and `user_id`.
- [ ] Return owner info where useful.

## 4. Core Class Improvements
- [ ] Add create/update/delete methods in `src/core/users.php`.
- [ ] Add single-pet and CRUD methods in `src/core/pets.php`.
- [ ] Improve error handling with try/catch and safe API messages.
- [ ] Keep prepared statements for all SQL interactions.

## 5. Database and Seed Data
- [ ] Expand `src/database/user_system.2.sql` with realistic sample records.
- [ ] Ensure foreign key constraints remain valid after seed updates.
- [ ] Add notes for resetting data: `docker compose down -v && docker compose up -d --build`.

## 6. UI and Manual Testing
- [x] Add basic API test interface at `src/index.html`.
- [ ] Add UI actions for creating/updating/deleting users.
- [ ] Add UI actions for pets endpoints.
- [ ] Show friendly success/error statuses in UI.

## 7. Documentation
- [ ] Update `README.md` with full endpoint reference.
- [ ] Add request/response examples for each endpoint.
- [ ] Add local run, reset, and troubleshooting section.

## 8. Pre-Push Checklist
- [ ] Run stack: `docker compose up --build`.
- [ ] Verify app: `http://localhost:8080`.
- [ ] Verify DB tool: `http://localhost:8081`.
- [ ] Test all endpoints manually (or via Postman).
- [ ] Confirm no PHP warnings/fatal errors in responses.
- [ ] Commit with clear message and push branch.
