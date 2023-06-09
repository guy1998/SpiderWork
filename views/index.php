<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&family=Nunito&display=swap" rel="stylesheet">
    <!-- icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>SpiderWork</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar">
        <h2 class="navbar-logo"><a href="#">SPIDERWORK</a></h2>
        <div class="navbar-menu">
            <a href="../views/page.php">Jobs</a>
            <a href="../views/cvgenerator.php" target="_blank">Resume</a>
            <a href="../views/log-in.php">Sign In</a>
        </div>
        <div class="menu-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <!-- header -->
    <header>
        <h1 class="header-title">
            FIND YOUR <br> <span> PERFECT JOB </span> <br> EASILY
        </h1>
    </header>

    <!-- search -->
    <div class="search-wrapper">
        <form class="search-box" method="post" action="../controller/searchController.php">
            <div class="search-card">
                <input class="search-input" type="text" name="searchResult" placeholder="Job title or keywords">
                <button class="search-button">Search</button>
            </div>
        </form>
    </div>

    <!-- filter box -->
    <div class="filter-box">
        <div class="filter-dropdown">
            <select class="filter-select" id="job-level" name="job-level">
                <option>Job Level</option>
                <option>Entry</option>
                <option>Mid-Senior</option>
                <option>Director</option>
            </select>
            <select class="filter-select" id="job-function" name="job-function">
                <option>Job Function</option>
                <option>IT</option>
                <option>Management</option>
                <option>Education</option>
            </select>
            <select class="filter-select" id="employment" name="employment">
                <option>Employment Type</option>
                <option>Internship</option>
                <option>Part Time</option>
                <option>Full Time</option>
            </select>
            <select class="filter-select" id="location" name="location">
                <option>Locations</option>
                <option>Remote</option>
                <option>US</option>
                <option>UK</option>
            </select>
            <select class="filter-select" id="education" name="education">
                <option>Education</option>
                <option>High School</option>
                <option>Bachelor's Degree</option>
                <option>Master's Degree</option>
            </select>
        </div>
        <div class="filter-chosen">
            <div class="chosen-card">
                Remote <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Full Time <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Financial Tech <i class="fas fa-times-circle"></i>
            </div>
            <div class="chosen-card">
                Entry Level <i class="fas fa-times-circle"></i>
            </div>
        </div>
    </div>
    <section class="job-list" id="jobs">

        <?php
        if (isset($_SESSION['results']))
            $result = $_SESSION['results'];
        $i = 0;
        if (isset($result)) {
            while (count($result) > $i) {
        ?>

                <div class="job-card">
                    <div class="job-name">
                        <img class="job-profile" src="../images/amazon.svg">
                        <div class="job-detail">
                            <h4><?php echo $_SESSION['companyName']; ?></h4>
                            <h3><?php echo $result[$i]['job_title']; ?></h3>
                            <p><?php echo $result[$i]['job_description']; ?></p>
                        </div>
                    </div>
                    <div class="job-label">
                        <a class="label-a" href="#">HTML</a>
                        <a class="label-b" href="#">CSS</a>
                        <a class="label-c" href="#">Javascript</a>
                    </div>
                    <div class="job-posted">
                        Posted 2 mins ago
                    </div>
                </div>
        <?php
                $i += 1;
            }
        }
        ?>


        <!-- <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="../images/ebay.svg">
                <div class="job-detail">
                    <h4>Ebay</h4>
                    <h3>Business Development</h3>
                    <p>Lorem ipsum dolor sit, amet consectutar adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a class="label-a" href="#">HTML</a>
                <a class="label-b" href="#">CSS</a>
                <a class="label-c" href="#">Javascript</a>
            </div>
            <div class="job-posted">
                Posted 2 mins ago
            </div>
        </div>

        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="../images/tiktok.svg">
                <div class="job-detail">
                    <h4>Tiktok</h4>
                    <h3>Digital Marketing</h3>
                    <p>Lorem ipsum dolor sit, amet consectutar adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a class="label-a" href="#">HTML</a>
                <a class="label-b" href="#">CSS</a>
                <a class="label-c" href="#">Javascript</a>
            </div>
            <div class="job-posted">
                Posted 2 mins ago
            </div>
        </div>

        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="../images/youtube.svg">
                <div class="job-detail">
                    <h4>Youtube</h4>
                    <h3>UI UX Designer</h3>
                    <p>Lorem ipsum dolor sit, amet consectutar adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a class="label-a" href="#">HTML</a>
                <a class="label-b" href="#">CSS</a>
                <a class="label-c" href="#">Javascript</a>
            </div>
            <div class="job-posted">
                Posted an hour ago
            </div>
        </div>

        <div class="job-card">
            <div class="job-name">
                <img class="job-profile" src="../images/amazon.svg">
                <div class="job-detail">
                    <h4>Amazon</h4>
                    <h3>Software Engineer</h3>
                    <p>Lorem ipsum dolor sit, amet consectutar adipisicing elit.</p>
                </div>
            </div>
            <div class="job-label">
                <a class="label-a" href="#">HTML</a>
                <a class="label-b" href="#">CSS</a>
                <a class="label-c" href="#">Javascript</a>
            </div>
            <div class="job-posted">
                Posted an hour ago
            </div>
        </div> -->
        <button class="job-more">More List</button>
    </section>

    <!-- join -->
    <section class="join">
        <div class="join-detail">
            <h1 class="section-title">LETS START YOUR NEW JOB WITH US</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure laboriosam in suscipit at
                atque reprehenderit esse quasi accusantium.</p>
        </div>
        <button class="join-button">Join Now</button>
    </section>

    <!-- featured company -->
    <section class="featured" id="companies">

    </section>
</body>

</html>