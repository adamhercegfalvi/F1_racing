  <div class="row g-4">

    <!BEJELENTKEZÉS>
    <div class="col-12 col-lg-6">
        <div class="f1-form-card h-100">

            <h2>Bejelentkezés</h2>

            <form action="belep" method="post">

                <div class="mb-3">
                    <label for="login-user" class="form-label">
                        Felhasználónév
                    </label>
                    <input
                        type="text"
                        class="form-control"
                        id="login-user"
                        name="felhasznalo"
                        placeholder="Felhasználónév"
                        autocomplete="username"
                        required>
                </div>

                <div class="mb-3">
                    <label for="login-password" class="form-label">
                        Jelszó
                    </label>
                    <input
                        type="password"
                        class="form-control"
                        id="login-password"
                        name="jelszo"
                        placeholder="Jelszó"
                        autocomplete="current-password"
                        required>
                </div>

                <button type="submit"
                        name="belepes"
                        class="btn btn-danger f1-btn">
                    Belépés
                </button>

            </form>
        </div>
    </div>

    <!REGISZTRÁCIÓ>
    <div class="col-12 col-lg-6">
        <div class="f1-form-card h-100">

            <h2>Regisztráció</h2>

            <form action="regisztral" method="post">

                <div class="mb-3">
                    <label for="reg-lastname" class="form-label">
                        Vezetéknév
                    </label>
                    <input type="text"
                           class="form-control"
                           id="reg-lastname"
                           name="vezeteknev"
                           required>
                </div>

                <div class="mb-3">
                    <label for="reg-firstname" class="form-label">
                        Utónév
                    </label>
                    <input type="text"
                           class="form-control"
                           id="reg-firstname"
                           name="utonev"
                           required>
                </div>

                <div class="mb-3">
                    <label for="reg-username" class="form-label">
                        Felhasználónév
                    </label>
                    <input type="text"
                           class="form-control"
                           id="reg-username"
                           name="felhasznalo"
                           autocomplete="username"
                           required>
                </div>

                <div class="mb-3">
                    <label for="reg-password" class="form-label">
                        Jelszó
                    </label>
                    <input type="password"
                           class="form-control"
                           id="reg-password"
                           name="jelszo"
                           autocomplete="new-password"
                           required>
                </div>

                <button type="submit"
                        name="regisztracio"
                        class="btn btn-danger f1-btn">
                    Regisztráció
                </button>

            </form>
        </div>
    </div>

</div>