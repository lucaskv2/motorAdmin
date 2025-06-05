 <style>
    .footer {
      background-color: #ddd;
      padding: 2rem 1rem;
    }

    .footer input {
      background-color: white;
      border: none;
      padding: 0.5rem;
      width: 100%;
    }

    .btn-contacto {
      background-color: red;
      color: white;
      font-weight: bold;
      width: 100%;
      padding: 0.75rem;
      border: none;
    }

    .footer .social-icons img {
      width: 32px;
      height: 32px;
      margin: 0 0.5rem;
    }

    @media (max-width: 768px) {
      .footer .btn-contacto,
      .footer input {
        margin-bottom: 1rem;
      }

      .footer .text-center {
        margin-top: 1rem;
      }
    }
  </style>
<footer class="footer mt-auto">
    <div class="container">
      <div class="row align-items-start text-center text-md-start">
        <div class="col-md-4 mb-3 mb-md-0">
          <input type="text" readonly value="+54 9 11 1234 5678">
          <br><br>
          <input type="text" readonly value="contacto@motorAdmin.com">
        </div>

        <div class="col-md-4 mb-3 mb-md-0 d-flex flex-column align-items-center justify-content-start">
          <button class="btn-contacto">BOTÓN A CONTACTO</button>
          <div class="mt-2 text-muted small">TODOS LOS DERECHOS RESERVADOS</div>
        </div>

        <div class="col-md-4 d-flex flex-column align-items-center align-items-md-end">
          <div class="social-icons">
            <a href="https://wa.me/5491112345678" target="_blank">
              <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" alt="WhatsApp">
            </a>
            <a href="https://instagram.com/cuenta" target="_blank">
              <img src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png" alt="Instagram">
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>