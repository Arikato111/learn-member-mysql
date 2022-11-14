<p align="center">
    <img align="center" alt="php" width="40" height="30" src="https://github.com/Arikato111/Arikato111/raw/main/icons/php-plain.svg">
    <img align="center" alt="MySQL" width="40" height="30" src="https://github.com/Arikato111/Arikato111/raw/main/icons/mysql-original-wordmark.svg">
    <img align="center" alt="Bootstrap" width="40" height="30" src="https://raw.githubusercontent.com/Arikato111/Arikato111/main/icons/bootstrap-original.svg">
</p>

# <p align="center">learn member with mysql</p>

## Get started

- clone this repo and move file in folder to `/htdocs/`
- create Database named `eldenly`
- import `eldenly.sql` to Database
- start your apache server
- open [http://localhost](http://localhost)

## Inside it

- Bootstrap 5
- NEXIT
## TODOs

- [x] Register
- [x] Login
- [x] Show all members
- [x] Delete members
- [x] Edit members

## Database [MySQL]

### Databse name : `eldenly`

#### Table name : `member`

| Field | Type | Key | Extra |
| ----- | ---- | --- | ---- |
| mem_id | int(11) | PRI | AUTO_INCREMENT | 
| mem_name | varchar(100) |
| mem_address | varchar(200) |
| mem_date | date |
| mem_email | varchar(100) |
| mem_tel | varchar(20) |
| mem_user | varchar(50) |
| mem_password | varchar(50) |
| mem_status | varchar(10) |

---

#### Table name : `poll`

| Field | Type | Key | Extra |
| ----- | ---- | --- | ---- |
| poll_id | int(11) | PRI | AUTO_INCREMENT | 
| poll_name | varchar(200) |
| poll_date | date |
| poll_member_id | int(11) |