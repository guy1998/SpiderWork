<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Program Selection</title>
    <link rel="stylesheet" href="https://cdnjs.cloudfl are.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../styles/addListing.css">

</head>

<body>

    <div class="container">
        <div class="logo">
            <div class="bar">
                <img src="wbu.png" alt="">
            </div>
        </div>
        <div class="title">
            Add A New Listing
        </div>

        <form action="listingAdded.php" method="post">
            <div class="user-details">

                <div class="input-box">
                    <span class="details">Job Title <span class="star">*</span></span>
                    <input type="text" name="job_title" size="30" placeholder="Job Title" maxlength="45" required>
                </div>

                <div class="input-box">
                    <span class="details">Job Description <span class="star">*</span></span>
                    <input type="text" name="job_description" size="30" placeholder="Job Description">
                </div>

                <div class="input-box">
                    <span class="details">Job Type <span class="star">*</span></span>
                    <input type="text" name="job_type" placeholder="Job Type">
                </div>

                <div class="input-box">

                    <span class="details">Salary</span>
                    <input type="text" name="salary" size="30" maxlength="45" placeholder="Salary">
                </div>
                <div class="input-box">

                    <span class="details">Company Profile</span>
                    <input type="text" name="company_profile" size="30" maxlength="45" placeholder="Company Profile">
                </div>
                <div class="input-box">

                    <span class="details">Application Deadline</span>
                    <input type="date" name="deadline" min="2023-06-06">
                </div>
            </div>
            <div class="button">
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
        </form>


        <div class="button">

            <form action="employer.php" method="post">
                <input type="submit" class="return" id="return" value="Back" name="back">

            </form>
        </div>
</body>

</html>