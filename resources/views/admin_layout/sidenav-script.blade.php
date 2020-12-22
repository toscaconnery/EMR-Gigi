<script>
    $(document).ready(function(){
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }

        $('#close_sidenav_btn').on('click', function() {
            document.getElementById("close_sidenav_btn").classList.add("non-visible");
            closeNav();
            document.getElementById("open_sidenav_btn").classList.remove("non-visible");
        });

        $('#open_sidenav_btn').on('click', function() {
            document.getElementById("open_sidenav_btn").classList.add("non-visible");
            openNav();
            document.getElementById("close_sidenav_btn").classList.remove("non-visible");
        });

        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    });
</script>