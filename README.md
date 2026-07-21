<h2>README FILE</h2>
<h3>Here, I'm going to explain my workflow, the technologies I use, and how they are used through the project</h3>
<h4>First of all, Containers will be used to represent MySQL and PHP</h4>

1 - Creating the working environment; Navigate to the root of the project, which in this context, is the 'News Project' folder, open a terminal and type in:
<pre>
"docker-compose up -d --build" OR "docker compose up -d --build"
</pre>
This command is the corner stone to build the working environment, it creats an internal network between the components of the project, the PHP server and the MySQL database.
</br>
Note that every time the yml file or the Docker file changes, the project has to be re-built for the changes to reflect.
<br>
- To stop the Docker containers :
<pre>
"docker-compose stop"
</pre>
- To start them again:<br>
<pre>
"docker-compose start"</h2>
</pre>
</br>
<h2> Accessing the MySQL Container & Using the MySQL CLI </h2>

- After starting the Docker environment, we will need to use the MySQL database through the CLI, a GUI in not mandatory, and this is easier even.


<b>1. Start an integrated terminal through the MySQL container</b><br>
Run this command from the project root directory:
<pre>
docker exec -it mysql_db bash
</pre>

</br>

<b>2. Login to the MySQL server inside the container</b><br>
Once inside the container, run:
<pre>
mysql -u root -p
</pre>
Password (could be found inside the yml file): <b>root</b>

</br>

<h1>This will be enough for now</h1>
<h4>After actually starting the project I will be adding more details to improve the context for whoever is reading</h4>
</br>

Now let's talk about the features that will be included in the project:
- User registration, login, logout.

- Manage subscription plans

- Categorize content into sections (business, tech, arts, breaking news…).

- Build a search system.

- “For You” page

- Widgets for quick news glance

- Manage tags, metadata, and filtering logic.

- Implement user “favorites” system for saved articles.

- User profile page: Account info, Subscriptions overview, Saved articles

- Admin panel for CRUD operations [on the articles and users]

- I 'could' try adding translation for several languages using an API, already did it in the native project, but it was a hassssssssslllllleeeee, if there is time I will do it



