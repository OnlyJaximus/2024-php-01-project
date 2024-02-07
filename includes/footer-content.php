<div class="py-5 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="footer-heading"><?php echo webSetting('title') ?? 'Meta Desc'; ?></h4>
                <hr>
                <p>
                    <?php echo webSetting('small_description') ?? 'Meta Desc'; ?>
                </p>
            </div>
            <div class="col-md-4">
                <h4 class="footer-heading">Folow us at</h4>
                <hr>
                <ul>
                    <?php
                    $socialMedia = getAll('socail_medias');
                    if ($socialMedia) {
                        if (mysqli_num_rows($socialMedia) > 0) {
                            foreach ($socialMedia  as $socalItem) {
                    ?>
                                <li>
                                    <a href="<?php echo $socalItem['url'] ?>"><?php echo $socalItem['name'] ?></a>
                                </li>

                    <?php
                            }
                        } else {
                            echo "<li>No Social Media Added</li>";
                        }
                    } else {
                        echo "<li>Something Went Wrong</li>";
                    }
                    ?>

                </ul>

            </div>


            <div class="col-md-4">
                <h4 class="footer-heading">Contact Information</h4>
                <hr>
                <p>Address: <?php echo webSetting('address') ?? '';  ?>
                <p>Email: <?php echo webSetting('email1') ?? '';
                            echo webSetting('email2') ?? '' ?>
                <p>Phone No: <?php echo webSetting('phone1') ?? '';
                                echo webSetting('phone2') ?? '' ?>

            </div>
        </div>
    </div>
</div>