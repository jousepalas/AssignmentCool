CREATE DATABASE coolblue;

  use coolblue;

  CREATE TABLE products
(
   id INT PRIMARY KEY,
   name VARCHAR(50) UNIQUE,
   salesPrice FLOAT,
   productTypeId INT
);

CREATE TABLE productTypes
(
   id INT PRIMARY KEY,
   name VARCHAR(50),
   canBeInsured BOOLEAN
   );

INSERT INTO products (id, name, salesPrice, productTypeId)
VALUES (572770, "Samsung WW80J6400CW EcoBubble", 475, 124), 
      (715990, "Canon Powershot SX620 HS Black", 195, 33),
      (725435, "Cowon Plenue D Gold", 299.99, 12),
      (735246, "AEG L8FB86ES", 699, 124),
      (735296, "Canon EOS 5D Mark IV Body", 2699, 35),
      (767490, "Canon EOS 77D + 18-55mm IS STM", 749, 35),
      (780829, "Panasonic Lumix DC-TZ90 Silver", 319, 33),
      (805073, "Haier HW80-B14636", 449, 124 ),
      (819148, "Nikon D3500 + AF-P DX 18-55mm f/3.5-5.6G VR", 469, 35),
      (827074, "Samsung Galaxy S10 Plus 128 GB Black", 699, 32),
      (828519, "Huawei P30 Lite 128 GB Black", 219, 32),
      (832845, "Apple iPod Touch (2019) 32 GB Space Gray", 229, 12),
      (836194, "Sony CyberShot DSC-RX100 VII", 1129, 33),
      (836676, "Sandisk Clip Sport Plus Blue", 74.99, 12),
      (837856, "Lenovo Chromebook C330-11 81HY000MMH", 299, 21),
      (838978, "Asus ZenBook UX334FAC-A3066T", 1149, 841),
      (858421, "Lenovo IdeaPad L340-15IRH Gaming 81LK01FUMH", 779, 21),
      (859366, "OnePlus 8 Pro 128GB Black 5G", 886, 32),
      (861866, 'Apple MacBook Pro 13\" (2020) MXK52N/A Space Gray', 1749, 21)
      
   INSERT INTO productTypes (id, name, canBeInsured)
   VALUES (21, "Laptops", true),
   (32, "Smartphones", true ),
   (33, "Digital cameras", true),
   (35, "SLR cameras", false),
   (12, "MP3 players", false),
   (124, "Washing machines", true),
   (841, "Laptops", false) 
  