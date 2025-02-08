<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Landing Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #6e45e2, #88d3ce);
            color: #fff;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        header a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        .hero {
            text-align: center;
            padding: 50px 20px;
        }

        .hero img {
            max-width: 100%;
            height: auto;
        }

        .hero h1 {
            font-size: 3em;
            margin: 20px 0;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .hero .cta {
            background-color: #ff007f;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 50px 20px;
        }

        .card {
            background: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 20px;
            width: 300px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card h3 {
            margin: 20px 0 10px;
            font-size: 1.5em;
        }

        .card p {
            padding: 0 15px 20px;
            font-size: 1em;
        }
    </style>
</head>

<body>

    <header>
        <h2>LOGO</h2>
        <nav>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
            <a href="#community">Community</a>
        </nav>
    </header>

    <section class="hero">
        <img src="https://via.placeholder.com/600x300" alt="E-learning Illustration">
        <h1>Welcome to E-Learning Industry</h1>
        <p>Learn from the best instructors with interactive lessons and resources.</p>
        <button class="cta">Get Started Now!</button>
    </section>

    <section class="cards">
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Interactive Courses">
            <h3>Interactive Courses</h3>
            <p>Engage with lessons and exercises to build your skills.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Expert Instructors">
            <h3>Expert Instructors</h3>
            <p>Learn from industry leaders and seasoned professionals.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Flexible Learning">
            <h3>Flexible Learning</h3>
            <p>Study at your own pace anytime, anywhere.</p>
        </div>
    </section>

    <section class="cards">
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Student Support">
            <h3>Student Support</h3>
            <p>Get guidance and support from our dedicated team.</p>
        </div>
        <div class="card">
            <img src="https://via.placeholder.com/300x150" alt="Certification">
            <h3>Certification</h3>
            <p>Earn certificates to showcase your achievements.</p>
        </div>
    </section>

</body>

</html>
