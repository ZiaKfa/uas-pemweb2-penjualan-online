<footer class="footer footer-center w-full p-3 bg-gray-300 text-gray-800" style="position: fixed; bottom: 0; left: 0; right: 0;">
    <div class="text-center">
        <p>
            Copyright © 2024 -
            <a class="font-semibold" href="">Uang Lebih Manis Daripada Madu</a>
        </p>
    </div>
</footer>
</body>
<script>
    @if(session('status'))
        alert('{{session('status')}}');
    @endif
</script>
</html>
