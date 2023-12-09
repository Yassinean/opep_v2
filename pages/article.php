<?php
$conn = mysqli_connect("localhost", "root", "", "o_pepv2");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Blog</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class='p-2 bg-slate-100'>
        <div class="flex">
            <div class="w-4/5">
                <div class='flex justify-between items-center p-5 w-full m-auto'>
                    <img class="w-20" src="../images/logo.webp" alt="">
                    <ul class='flex justify-center items-center'>
                        <a href="#" class='mx-2 ease-in duration-300 hover:bg-stone-100 hover:text-black bg-gray-700 text-white rounded-md px-3 py-2 text-sm font-medium'>Accueil</a>
                        <a href="#" class='ease-in duration-300 class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium'>Store</a>
                    </ul>
                    <h1 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bonjour Oussama znagui</h1>
                </div>
                <div class='my-5  h-3/4 text-center'>
                    <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">Bienvenue dans le theme theme #1</h1>
                    <p class="px-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit earum voluptates quae, amet deleniti totam culpa qui adipisci repellat quo necessitatibus molestias enim quis, labore rem porro, et doloremque ad.</p>
                    <!-- ======================Search form================================== -->
                    <div class="search m-10">
                        <div class="text-center mt-5 mb-4">
                            <h2>CHERCHER UN ARTICLE</h2>
                        </div>
                        <input type="text" class="form-control" id="live_search" placeholder="search ...">
                    </div>

                    <!-- ======================Search form================================== -->
                    
                    <div id="resultat"></div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-4/5 m-auto my-5">
                        <?php

                        $sqlArticles = "SELECT * FROM article";
                        $resultArticles = $conn->query($sqlArticles);


                        while ($row = mysqli_fetch_assoc($resultArticles)) {
                            $titreArticle = $row['titreArticle'];
                            $textArticle = $row['textArticle'];
                            $imageArticle = $row['imageArticle'];
                        ?>
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <img class="rounded-t-lg" src="<?php echo $imageArticle; ?>" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $titreArticle; ?></h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?php echo $textArticle; ?></p>
                                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Read more
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>


                    </div>


                </div>
            </div>

            <div class="h-screen w-1/5">
                <div class="w-full h-full bg-white">
                    <div class="bg-black">
                        <h1 class="mb-4 text-2xl font-extrabold leading-none tracking-tight  md:text-4xl lg:text-4xl text-white text-center py-5">
                            TAGS
                        </h1>
                    </div>
                    <div class="flex flex-col justify-center items-center w-4/5 m-auto">
                        <?php

                        $sqlTags = "SELECT * FROM tag";
                        $resultTags = $conn->query($sqlTags);


                        while ($row = mysqli_fetch_assoc($resultTags)) {
                            $tagName = $row['textTag'];
                        ?>
                            <button type="button" class="w-full text-gray-900 bg-white border border-gray-300  hover:bg-gray-100   font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 "><?php echo $tagName; ?></button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#live_search").keyup(function() {
                var input = $(this).val();
                //alert(input);
                if (input != "") {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            input: input
                        },
                        success: function(data) {
                            $("#resultat").html(data);
                            $("#resultat").css("display", "block");
                        }
                    });
                } else {
                    
                    $("#resultat").html(""); 
                    $("#resultat").css("display", "none");
                }
            });
        });
    </script>

</body>

</html>