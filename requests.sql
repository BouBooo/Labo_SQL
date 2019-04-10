/* Request 1 : Informations about the company */

SELECT COUNT(com.IdCompany) as "Company",
        (SELECT COUNT(c.IdChenil) FROM chenil c) as "Chenils",
        (SELECT COUNT(e.IdEmployee) FROM employees e) as "Employees",
        (SELECT COUNT(j.IdJob) FROM jobs j) as "Jobs",
        (SELECT COUNT(a.IdAnimal) FROM animals a) as "Animals",
        (SELECT COUNT(cat.IdCategory) FROM categories cat) as "Categories",
        (SELECT COUNT(r.IdRace) FROM races r) as "Races"
FROM company com


/* Request 2 : See rooms infos */

SELECT r.IdRoom, r.roomName, r.capacity, c.categoryName,
        (SELECT COUNT(idAnimal) FROM animals WHERE idRoom = r.IdRoom AND adopted = 0) as "Animals count"
FROM rooms r
JOIN categories c
ON c.IdCategory = r.IdCategory
ORDER BY r.roomName 


/* Request 3 : See which animal category has the most adoption between X date and Y date */

SELECT "Nombre adoption", COUNT(a.adopted) as "Chiens", 
        (SELECT COUNT(a.adopted) 
        FROM animals a     
        JOIN categories c    
        ON c.IdCategory = a.IdCategory 
        JOIN buyers b
        ON b.IdAnimal = a.IdAnimal  
        WHERE c.IdCategory = 2 
        AND a.adopted = 1
        AND b.AdoptedAt BETWEEN "' . $date_1 . '" AND "' . $date_2 . '" ) "Chats"
FROM animals a     
JOIN categories c    
ON c.IdCategory = a.IdCategory 
JOIN buyers b
ON b.IdAnimal = a.IdAnimal  
WHERE c.IdCategory = 1  
AND a.adopted = 1
AND b.AdoptedAt BETWEEN "' . $date_1 . '" AND "' . $date_2 . '"


/* Request 4 : See the most popular dog breed */

SELECT DISTINCT r.raceName, 
    (SELECT COUNT(a.IdRace) 
    FROM animals a 
    WHERE a.IdRace = r.IdRace 
    AND a.adopted = 1) as "Adopted"
FROM races r
JOIN animals a
ON a.IdRace = r.IdRace
ORDER BY Adopted DESC


/* Request 5 : Watch how many animals can manage an employee */

SELECT DISTINCT
        (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 1 AND a.adopted = 0) as "Bordeaux animals",
        (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 2 AND a.adopted = 0) as "Marseille animals",
        (SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.IdChenil = 3 AND a.adopted = 0) as "Paris animals",
        (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 1 AND e.IdJob = 4) as "Bordeaux employees",
        (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 2 AND e.IdJob = 4) as "Marseille employees",
        (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdChenil = 3 AND e.IdJob = 4) as "Paris employees",
        (ROUND((SELECT COUNT(a.IdAnimal) FROM animals a WHERE a.adopted = 0) 
            / 
        (SELECT COUNT(e.IdEmployee) FROM employees e WHERE e.IdJob = 4))) as "Avg employees / animals"
FROM animals


/* Request 6 : Diet of dogs according to their age */

SELECT animalName, ROUND((DATEDIFF(NOW(), a.BornAt)/365), 1) AS "Age", f.foodName, f.Composition
FROM animals a
JOIN food_items f
ON a.IdFood = f.IdFood
WHERE IdCategory = 1  
ORDER BY `Age`


/* Request 7 : Which animal's category is the most expensive to feed */

SELECT ROUND(AVG((f.price*3)), 2) AS "AVG daily doggo" , 
        ROUND(AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total doggo", 
        ROUND(SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "total doggo", 
        (SELECT ROUND(AVG((f.price*3)),2)
            FROM food_items f
            JOIN animals a 
            ON a.IdFood = f.IdFood
            JOIN donators d 
            ON d.IdAnimal = a.IdAnimal
            WHERE a.IdCategory = 2) AS "AVG daily cat",
        (SELECT ROUND(AVG((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total cat" 
            FROM food_items f
            JOIN animals a 
            ON a.IdFood = f.IdFood
            JOIN donators d 
            ON d.IdAnimal = a.IdAnimal
            WHERE a.IdCategory = 2 ) AS "AVG total cat", 
        (SELECT ROUND(SUM((f.price*3)*(SELECT DATEDIFF(NOW(),d.GivenAt))),2) AS "AVG total feed cat" 
            FROM food_items f
            JOIN animals a 
            ON a.IdFood = f.IdFood
            JOIN donators d 
            ON d.IdAnimal = a.IdAnimal
            WHERE a.IdCategory = 2 ) AS "Total cat feed price"
FROM food_items f
JOIN animals a 
ON a.IdFood = f.IdFood
JOIN donators d 
ON d.IdAnimal = a.IdAnimal
WHERE a.IdCategory = 1


/* Request 8 : See which chenil won most money */

SELECT DISTINCT
        (SELECT SUM(i.Payement) 
        FROM invoice i 
        JOIN animals a
        ON a.IdAnimal = i.IdAnimal
        JOIN chenil c
        ON c.IdChenil = a.IdChenil
        WHERE c.IdChenil = 1) as "Chenil Bordeaux",
                                    
        (SELECT SUM(i.Payement) 
        FROM invoice i 
        JOIN animals a
        ON a.IdAnimal = i.IdAnimal
        JOIN chenil c
        ON c.IdChenil = a.IdChenil
        WHERE c.IdChenil = 2) as "Chenil Marseille",
                                    
        (SELECT SUM(i.Payement) 
        FROM invoice i 
        JOIN animals a
        ON a.IdAnimal = i.IdAnimal
        JOIN chenil c
        ON c.IdChenil = a.IdChenil
        WHERE c.IdChenil = 3) as "Chenil Paris"
FROM chenil c


/* Request 9 : Avgerage age of adopted animals */

SELECT COUNT(a.IdAnimal) as "Adopted animals count", 
    ROUND(AVG(DATEDIFF(b.adoptedAt, a.BornAt)/365), 2) as "Average age",
    (SELECT ROUND(AVG(DATEDIFF(NOW(), a.BornAt)/365), 2) 
        FROM animals a 
        WHERE a.adopted = 0) as "None adopted yet"
FROM animals a
JOIN buyers b 
ON a.IdAnimal = b.IdAnimal
WHERE a.adopted = 1


/* Request 10 : Determine when people are more likely to give (up) their pet */

SELECT COUNT(a.IdAnimal) AS "Summer donations", 
    (SELECT COUNT(a.IdAnimal)
    FROM animals a  
    WHERE a.ArrivalDate NOT LIKE "____-06-__"
    AND a.ArrivalDate NOT LIKE "____-07-__"
    AND a.ArrivalDate NOT LIKE "____-08-__") AS "Other donations"
FROM animals a 
WHERE a.ArrivalDate LIKE "____-06-__"
OR a.ArrivalDate LIKE "____-07-__"
OR a.ArrivalDate LIKE "____-08-__"

/* Enjoy ! */