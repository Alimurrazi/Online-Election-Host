# Online Election Host

Online Election Host is a web app for running elections online. An organiser creates an election with its posts, candidates and voters. A day before voting starts, each voter gets a password by email. Voters use it to cast their vote while the election is running, and the results are published when it ends.

This was my 2-2 (second year, second semester) database project.

## Table of contents

- [Features](#features)
- [How it works](#how-it-works)
- [Tech stack](#tech-stack)
- [Getting started](#getting-started)
- [Sending voter passwords](#sending-voter-passwords)
- [Database](#database)
- [Routes](#routes)
- [Project structure](#project-structure)
- [Known limitations](#known-limitations)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Create elections** with a name, start time and end time
- **Posts:** add positions (for example President or Secretary), with how many winners each one has
- **Candidates:** add candidates for each post, with name, team, image and video
- **Voters:** add voters, with name, ID number and email
- **Manage your elections:** edit or delete an election's details, posts, candidates and voters
- **Voter passwords by email,** sent automatically one day before the election starts
- **Voter login:** voters log in with their name, ID number, email and password, and can vote only once
- **Election list** grouped into upcoming, running and finished elections
- **Results:** the candidates with the most votes for each post are shown as winners once the election is over

## How it works

### For organisers

1. **Register** and log in.
2. Go to **Create Election** (`/electioncreate`) and fill in the steps:
   1. Election name, start time and end time
   2. Posts and their candidates
   3. Voters
3. Manage your elections from **My Elections** (`/myelection`).

### For voters

1. One day before the election starts, you receive an email with your password.
2. When the election is running, open it from the **election list** (`/electionlist`).
3. Enter your name, ID number, email and password.
4. Choose your candidates and submit. You can vote only once.

### Election status

The election list compares each election's start and end time with the current time (Asia/Dhaka time zone):

| Status | When | What you see |
|---|---|---|
| **Upcoming** | Before the start time | Election details |
| **Running** | Between start and end time | Voter login and ballot |
| **Finished** | After the end time | Results, with the winners for each post |

## Tech stack

- PHP with [Laravel 5.3](https://laravel.com/docs/5.3)
- MySQL
- Blade templates, Bootstrap, jQuery and Vue 2
- [Bootstrap Datetimepicker](https://github.com/smalot/bootstrap-datetimepicker) for picking election times
- Laravel Mail (SMTP) for sending voter passwords

## Getting started

### Requirements

- PHP 5.6.4–7.1
- [Composer](https://getcomposer.org/)
- MySQL
- An SMTP account for sending email (for example Gmail or [Mailtrap](https://mailtrap.io/) for testing)

### Installation

```bash
git clone https://github.com/Alimurrazi/Online-Election-Host.git
cd Online-Election-Host
composer install
cp .env.example .env
php artisan key:generate
```

1. Create a MySQL database.
2. In `.env`, set:
   - `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`
   - `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD` and `MAIL_ENCRYPTION`
3. Create the tables:

```bash
php artisan migrate
```

4. Start the development server:

```bash
php artisan serve
```

Then open http://localhost:8000.

## Sending voter passwords

Voter passwords are sent by the `email:send` Artisan command. For each election that starts within the next 24 hours and hasn't had its emails sent yet, it:

1. generates a new password for every voter
2. emails it to them
3. marks the election so the emails aren't sent twice

Run it by hand:

```bash
php artisan email:send
```

Or run it every minute with cron, so passwords go out automatically:

```cron
* * * * * cd /path/to/Online-Election-Host && php artisan email:send >> /dev/null 2>&1
```

## Database

| Table | What it holds |
|---|---|
| `users` | Organiser accounts |
| `election` | Elections, with name, start time, end time and whether voter emails were sent |
| `post` | Posts in each election, with the number of winners and candidates |
| `candidate` | Candidates for each post, with team, image, video and vote count |
| `voter` | Voters for each election, with name, ID number, email, password and whether they have voted |
| `userrelation` | Which organiser owns which election |
| `password_resets` | Password reset tokens for organisers |

## Routes

| Method | URL | Purpose |
|---|---|---|
| GET | `/` | Home page |
| GET | `/about` | About page |
| GET, POST | `/login`, `/register`, `/password/reset` | Organiser authentication |
| GET | `/electionlist` | All elections, by status |
| GET | `/{election_id}/{election_status}` | Open an election |
| POST | `/formfillup/{id}` | Voter login |
| POST | `/votesubmit` | Submit a vote |
| GET | `/electioncreate` | Create an election |
| POST | `/electiondata`, `/electioncandidate`, `/electionvoter` | Election creation steps |
| GET | `/myelection` | Your elections |
| GET | `/we/see/{id}` | Manage an election |
| GET | `/my/list/{id}/Fundamental`, `/Post`, `/Candidate`, `/Voter` | Edit an election's details, posts, candidates or voters |
| POST | `/my/Fundamental/Update`, `/my/Post/Update`, `/my/Candidate/Update`, `/my/Voter/Update` | Save changes |
| GET | `/my/Fundamental/Delete/{id}`, `/my/Post/Delete/{id}`, `/my/Candidate/Delete/{id}`, `/my/Voter/Delete/{id}` | Delete |

## Project structure

| Path | What it holds |
|---|---|
| `routes/web.php` | All routes |
| `app/Http/Controllers/` | Controllers for creating, listing, editing and voting in elections |
| `app/Console/Commands/SendEmailCommand.php` | The `email:send` command that emails voter passwords |
| `app/` | Models (`ElectionModel`, `PostModel`, `CandidateModel`, `VoterModel`, `User`) |
| `database/migrations/` | Table definitions |
| `resources/views/` | Blade templates (`running`, `future` and `older` show running, upcoming and finished elections) |
| `resources/views/emails/send.blade.php` | Voter password email |
| `public/` | Entry point and assets |

## Known limitations

- **Old framework:** Laravel 5.3 and PHP 5.6/7.0 are no longer supported.
- **Scheduler name mismatch:** `app/Console/Kernel.php` schedules `send:email`, but the command is called `email:send`, so `php artisan schedule:run` won't send emails. Use the cron line under [Sending voter passwords](#sending-voter-passwords) instead.
- **Time zone:** election status uses the Asia/Dhaka time zone.

## Contributing

Issues and pull requests are welcome.

## License

This project is built on the Laravel framework, which is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
