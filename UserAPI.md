**Register**
----
  註冊

* **URL**

  /api/user/regist

* **Method:**

  `POST`
  
*  **URL Params**
  None

* **Data Params**

  **Required:**

  `<account> string, 帳號, ex: ray`
  `<password> string, 密碼, 長度6-12位數 ex: a123456`
  `<email> string, 信箱 ex: ray@abc.com`

  **Optional:**

  `<isAdmin> integer, 是否為管理員, ex: 1(是)或0(否)`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
        ```json
        {
            "success": true,
            "data": {
                "token": "L9TOA5sCTGray7"
            },
            "message": "Regist successfully."
        }
        ```

* **Error Response:**

  * **Code:** 500 <br />
    **Description:** 參數驗證錯誤 <br />
    **Content:**
        ```json
        {
            "success": false,
            "message": "Validation Error.",
            "data": {
                "account": [
                    "The account has already been taken."
                ],
                "password": [
                    "The password must be at least 6 characters."
                ],
                "email": [
                    "The email field is required."
                ]
            }
        }
        ```
        
  OR

  * **Code:** 500  <br />
    **Description:** 寫入DB失敗 <br />
    **Content:** 
        ```json
        {
            "success": false,
            "message": "Regist fail.",
            "data": {}
        }
        ```


**Login**
----
  登入

* **URL**

  /api/user/login

* **Method:**

  `POST`
  
*  **URL Params**
  None

* **Data Params**

  **Required:**

  `<account> string, 帳號, ex: ray`
  `<password> string, 密碼, 長度6-12位數 ex: a123456`

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** 
        ```json
        {
            "success": true,
            "data": {
                "token": "Hl8aqyosC2"
            },
            "message": "Login as admin."
        }
        ```

* **Error Response:**

  * **Code:** 500 <br />
    **Description:** 帳號或密碼錯誤 <br />
    **Content:**
        ```json
        {
            "success": false,
            "message": "Wrong account or password！"
        }
        ```


**Logout**
----
  登出

* **URL**

  /api/user/logout

* **Method:**

  `GET`

*  **Headers**

   **Required:**

   `Authorization: Bearer <token>`
  
*  **URL Params**
  None

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** 
        ```json
        {
            "success": true,
            "data": [],
            "message": "Logged out successfully."
        }
        ```


**Userinfo**
----
  回傳一筆(一般用戶只回傳自己)或多筆(管理員回傳全部)用戶的資訊

* **URL**

  /api/user/info

* **Method:**

  `GET`

*  **Headers**

   **Required:**

   `Authorization: Bearer <token>`
  
*  **URL Params**
  None

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** 
        ```json
        {
            "success": true,
            "data": {
                "account": "ray",
                "password": "a123456",
                "mail": "ray@gmail.com"
            },
            "message": "Users retrieved successfully."
        }
        ```
