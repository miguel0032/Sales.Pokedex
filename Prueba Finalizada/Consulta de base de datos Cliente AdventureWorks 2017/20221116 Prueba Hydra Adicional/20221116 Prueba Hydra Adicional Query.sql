--Prueba Hydra Adicional




-- Consulta 1
SELECT TOP 1
    Id_Route,
    MIN(Delivery_Date) AS Min_Delivery_Date,
    MIN(ID_Split) AS Min_ID_Split
FROM
    dbo.tabla_prueba
WHERE
    ID_Split > 0
    AND Status = '1'
GROUP BY
    Id_Route
ORDER BY
    Id_Route;

-- Consulta 2
SELECT
    Id_Route,
    MIN(Delivery_Date) AS Min_Delivery_Date,
    MIN(ID_Split) AS Min_ID_Split
FROM
    dbo.tabla_prueba
WHERE
    ID_Split > 0
    AND Status = '1'
GROUP BY
    Id_Route
ORDER BY
    Id_Route;