# cis371-project
My Web Application Project for CIS-371 at Grand Valley State.

The project is made up of three components:
  - Report Gateway
  - MySQL (MariaDB)
  - Web Server (Apache2)

![alt text](https://raw.github.com/jsirianni/cis371-project/dev/http_server/images/logical.png)


### Report Gateway
The Report Gateway is a lightweight program written in GO Language.
It starts by opening a socket on port 8090 and listens for incoming "reports".
Each report is parsed for its "status" and then deposited in a MySQL database.
The Report Gateway can even send email alerts for "bad" reports.

In testing, the Gateway was capable of handling 1 million incoming connections
every minute, however, the MySQL database was unable to keep up.

All reports are sent from any machine running the GO client. The client is a
very basic program that is just enough to send a static report. Building an
actual client is something I would like to do in the future, but was outside
of the scope of this project.

### MySQL
MariaDB (MySQL drop in replacement) was used to store reports. Each report has
an ID, hostname, status, and time-stamp.

### Apache2
Apache web server was used to serve web browser connections. While I would have
prefered to use GO's built in HTTP server, I required an immediate solution
that offered easy HTTPS and Authentication. Building my own HTTP server in GO
would have been outside the scope of this project.

### Assignment Requirements
    - Acquire your own data
    - The data should be stored in a database.
    - CSS should be used to style all webpage content
    - Use a combination of server-side (PHP) and client-side (javaScript) scripting
    - There should be at least one page that allows the user to make changes to the data.
      - You should use forms to do this and javaScript should be used to validate the input.
    - You must make some use of AJAX

### Why I choose this idea
Being able to monitor your servers (and your client's servers) accurately is
invaluable in the IT industry. There are many solutions for this problem, however,
many of them require active agents to be running on the machines, or they require
the server to reach out to each client. Neither of these options is what I was after.

#### The advantage of my program is
1) It is 'almost' client-less. The client can be run from a cron job, and is only
run when the report needs to be sent.

2) The client can also be tailored to the
server's application.

I plan to write clients in the future that will do the following
  - Check the status of ZFS on Linux
  - Check the status of MDADM
  - Check uptime
  - Check the status of various services (MySQL, Plex, Apache)

3) The Gateway is scalable. Several gateways can be placed behind a load-balancer.
The client is not dependant upon any specific Gateway and the database does not care
which Gateway is depositing data.

4) The client is sending to a specific Domain name, which will never change.
My current solution involves each server sending email by utilizing a Gmail
service account. If this Gmail account is compromised, the servers will have to
be manually updated with a new email account. This is not scalable. My solution
is much more robust because the clients are sending their reports to a domain that
will never change. Email alerts are then sent from the Gateway, which is easily
updated if required.

5) My program solves a real world problem that I face
