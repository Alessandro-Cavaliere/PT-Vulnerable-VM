# Penetration Testing & Ethical Hacking - Vulnerable VM Project

## Project Description
This repository contains the final project for the Penetration Testing & Ethical Hacking exam, part of the second-year CyberSecurity Master's degree at the University of Salerno.

The project consists of a Virtual Machine (VM), intentionally vulnerable ("vulnerable by design"), aimed at testing and improving users' cybersecurity skills. Given that penetration testing is a discipline requiring practical abilities, this VM offers a safe, practical platform to learn, test, and enhance cybersecurity skills while preparing users for real-world attack and defense scenarios.

## Services 
All services hosted on the VM are detailed in the "/services" directory. `home.php` refers to level 2, while the other files all refer to level 1.

## Simplified File Upload via SFTP
The following configuration allows simplified file upload using SFTP on vscode, included in `services/vscode/sftp.json`:

```json
{
  "name": "pentestVM",
  "host": "192.168.56.106",
  "protocol": "sftp",
  "port": 22,
  "username": "chall",
  "password": "chall",
  "remotePath": "/var/www/html",
  "uploadOnSave": true,
  "useTempFile": false,
  "openSsh": false
}
```

## VM Challenges & Vulnerabilities
The VM contains three Capture the Flag (CTF) challenges, each hosted via Apache and designed to incrementally test users’ abilities against common security vulnerabilities:

### Level 1 - Race is Fun (Race Condition)
This web-based CTF challenge involves exploiting PHP files vulnerable to race conditions. The goal is to bypass access controls through concurrent web requests.

### Level 2 - PHP Injection
This challenge demonstrates exploiting a PHP Injection vulnerability within an input form, allowing attackers to achieve remote code execution (RCE). The PHP version used is 7, intentionally selected as it is a relatively old and deprecated version. The PHP code at this level (`services/home.php`) implements a filter (an array of characters, classes, functions, variables, and strings) designed to prevent execution of dangerous functions such as `eval`, `include`, `require`, etc. Essentially, all common exploiting vectors are blacklisted. However, this filter is ineffective and can be bypassed by an attacker.

### Level 3 - Privilege Escalation
In the final level, you will exploit an incorrectly configured software with the `setuid` bit enabled. Successfully exploiting this vulnerability will grant privilege escalation to the root user, securing full control over the system.

## Final Flag
Upon completing all three CTF levels, participants can obtain a hidden flag within a file accessible only by the root user.

> **Note:** This file serves solely as a Proof of Concept (PoC).

## Conclusion
Each challenge was carefully crafted to test cybersecurity competencies, from vulnerability identification to the execution of effective exploits. The project provides a controlled environment for safely learning and honing penetration testing and ethical hacking skills.

> Enjoy hacking responsibly!
