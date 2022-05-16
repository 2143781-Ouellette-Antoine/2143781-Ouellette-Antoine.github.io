<?php
/**
 * Pied de page de toutes les pages de mon site.
 * @author Antoine Ouellette
 */
?>
    </div>
</div>
<!-- fin contenu2 -->
<!-- pied de page -->
<div class="section_footer">
    <div class="container">
        <div class="footer_section_2">
            <div class="row justify-content-sm-center">
                <div class="col-sm-6">
                    <h2 class="account_text">Qui suis-je?</h2>
                    <p class="ipsum_text">Je m'appelle Antoine Ouellette. Je suis étudiant en 2<sup>eme</sup> session en
                        Techniques de l'informatique</p>
                    <p class="ipsum_text">J'apprends en ce moment le PHP, le SQL et le C#.</p>
                </div>
                <div class="col-sm-3">
                    <h2 class="account_text">Suivez-moi!</h2>
                    <div class="image-icon"><img src="medias/commun/fb-icon.png"><span class="fb_text">
                            <a href="https://www.facebook.com/pages/category/News---media-website/GSMArenacom-189627474421/">Facebook</a></span></div>
                    <div class="image-icon"><img src="medias/commun/twitter-icon.png"><span class="fb_text">
                            <a href="https://twitter.com/micotoronto">Twitter</a></span>
                    </div>
                    <div class="image-icon"><img src="medias/commun/in-icon.png"><span class="fb_text">
                            <a href="https://www.linkedin.com/company/newegg-com/">Linkedin</a></span></div>
                    <div class="image-icon"><img src="medias/commun/youtube-icon.png"><span class="fb_text">
                            <a href="a-venir.php">Youtube</a></span>
                    </div>
                    <div class="image-icon"><img src="medias/commun/instagram-icon.png"><span class="fb_text">
                            <a href="a-venir.php">Instagram</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin pied de page -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright">2022 Tous droits réservés. Maquette inspirée de <a href="https://html.design">Free html Templates</a>.</p>
        <p class="copyright">Site Web par Antoine Ouellette. Année:<?php echo date("Y"); ?></p>
    </div>
</div>
<?php
if (isset($visible_tiny_mce))
{
    echo "
        <script src=\"https://cdn.tiny.cloud/1/suyudwrrjr855u2yvi15qj43lyz9hphp2vjpxymyw6im1ped/tinymce/6/tinymce.min.js\" referrerpolicy=\"origin\"></script>
        <script>
            tinymce.init({
                selector:'textarea.tinymce',
                menubar: false,
                plugins: 'link, image, lists, code, table',
                toolbar: 'bold italic | link image | bullist numlist | table | pastetext removeformat | code'
            });
        </script>
    ";
}
?>
</body>

</html>