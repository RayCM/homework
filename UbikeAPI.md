**Search stations**
----
  搜尋場站資訊
  -依搜尋內容對中文場站名稱、中文場站區域、中文地址三個欄位進行模糊搜尋比對。

* **URL**

  /api/ubike/stations/{search}

* **Method:**

  `GET`

*  **Headers**

   **Required:**

   `Authorization: Bearer <token>`
  
*  **URL Params**
  **Required:**
 
   `<search> string, 搜尋內容, ex: 中研公園`

* **Data Params**

  None

* **Response:**

  * **Code:** 200 <br />
    **Content:** 
        ```json
        {
            "success": true,
            "data": [
                {
                    "id": 39,
                    "sno": "0041",
                    "sna": "中研公園",
                    "tot": 30,
                    "sbi": 6,
                    "sarea": "南港區",
                    "mday": "20210503115339",
                    "lat": 25.05,
                    "lng": 121.61,
                    "ar": "研究院路二段12巷/研究院路二段12巷58弄(西南側)",
                    "sareaen": "Nangang Dist.",
                    "snaen": "Academia Park",
                    "aren": "The S.W side of Ln. 12, Sec. 2, Academia Rd. & Aly. 58, Ln. 12, Sec. 2, Academia Rd.",
                    "bemp": 24,
                    "act": 1,
                    "created_at": "2021-05-03 03:55:50",
                    "updated_at": "2021-05-03 03:55:50"
                }
            ],
            "message": "Stations retrieved successfully."
        }
        ```


**All stations**
----
  全部場站資訊

* **URL**

  /api/ubike/stations

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
            "data": [
                {
                    "id": 1,
                    "sno": "0001",
                    "sna": "捷運市政府站(3號出口)",
                    "tot": 180,
                    "sbi": 2,
                    "sarea": "信義區",
                    "mday": "20210503115316",
                    "lat": 25.04,
                    "lng": 121.57,
                    "ar": "忠孝東路/松仁路(東南側)",
                    "sareaen": "Xinyi Dist.",
                    "snaen": "MRT Taipei City Hall Stataion(Exit 3)-2",
                    "aren": "The S.W. side of Road Zhongxiao East Road & Road Chung Yan.",
                    "bemp": 177,
                    "act": 1,
                    "created_at": "2021-05-03 03:55:50",
                    "updated_at": "2021-05-03 03:55:50"
                },
                {
                    "id": 2,
                    "sno": "0002",
                    "sna": "捷運國父紀念館站(2號出口)",
                    "tot": 48,
                    "sbi": 14,
                    "sarea": "大安區",
                    "mday": "20210503115327",
                    "lat": 25.04,
                    "lng": 121.56,
                    "ar": "忠孝東路四段/光復南路口(西南側)",
                    "sareaen": "Daan Dist.",
                    "snaen": "MRT S.Y.S Memorial Hall Stataion(Exit 2.)",
                    "aren": "Sec,4. Zhongxiao E.Rd/GuangFu S. Rd",
                    "bemp": 33,
                    "act": 1,
                    "created_at": "2021-05-03 03:55:50",
                    "updated_at": "2021-05-03 03:55:50"
                },
                ...
            ],
            "message": "Stations retrieved successfully."
        }
        ```
