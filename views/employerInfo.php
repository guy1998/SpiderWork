<?php
require_once('../connector/connect.php');
$employerId = $_GET['id'];

$query = "SELECT * FROM employer WHERE employerId = $employerId";
$result = mysqli_query($dbc, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $employerInfo = mysqli_fetch_assoc($result);
    $jobQuery = "SELECT * FROM joblisting WHERE employerId = $employerId";
    $jobResult = mysqli_query($dbc, $jobQuery);

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Employer Information</title>
        <link rel="stylesheet" href="../styles/employerInfo.css" />
    </head>

    <body>
        <div class="container">
            <h1>Employer Information</h1>
            <img src="<?php echo $employerInfo['profilepic']; ?>" class="profile-pic" alt="Profile Picture">
            <div class="info-item">
                <div class="info-label">Employer ID:</div>
                <div class="info-value"><?php echo $employerInfo['employerId']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Contact Name:</div>
                <div class="info-value"><?php echo $employerInfo['contactName']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Contact Surname:</div>
                <div class="info-value"><?php echo $employerInfo['contactSurname']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Company Name:</div>
                <div class="info-value"><?php echo $employerInfo['companyName']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Owner Name:</div>
                <div class="info-value"><?php echo $employerInfo['ownerName']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Owner Surname:</div>
                <div class="info-value"><?php echo $employerInfo['ownerSurname']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Field:</div>
                <div class="info-value"><?php echo $employerInfo['field']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Email:</div>
                <div class="info-value"><?php echo $employerInfo['email']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Username:</div>
                <div class="info-value"><?php echo $employerInfo['username']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Password:</div>
                <div class="info-value"><?php echo $employerInfo['password']; ?></div>
            </div>
            <div class="info-item">
                <div class="info-label">Founding Date:</div>
                <div class="info-value"><?php echo $employerInfo['foundingDate']; ?></div>
            </div>
            <h2>Job Listings</h2>
            <div class="job-listings">

                <?php
                // Check if there are job listings
                if ($jobResult && mysqli_num_rows($jobResult) > 0) {
                    // Loop through each job listing
                    while ($jobInfo = mysqli_fetch_assoc($jobResult)) {
                ?>
                        <div class="job-item">
                            <div class="job-title"><?php echo $jobInfo['job_title']; ?></div>
                            <div class="job-description"><?php echo $jobInfo['job_description']; ?></div>
                            <div class="job-type">Job Type: <?php echo $jobInfo['job_type']; ?></div>
                            <div class="salary">Salary: <?php echo $jobInfo['salary']; ?></div>
                            <div class="company-profile">Company Profile: <?php echo $jobInfo['company_profile']; ?></div>
                            <div class="deadline">Application Deadline: <?php echo $jobInfo['application_deadline']; ?></div>
                            <!-- Display other job listing details as needed -->
                        </div>
                <?php
                    }
                } else {
                    echo "No job listings found.";
                }
                ?>
            </div>
            <br><br>
            <a href="jobseeker.php" class="back-button">Back</a>

        </div>

    </body>

    </html>

<?php
} else {
    echo "Employer not found.";
}


// Close the database connection
mysqli_close($dbc);
?>