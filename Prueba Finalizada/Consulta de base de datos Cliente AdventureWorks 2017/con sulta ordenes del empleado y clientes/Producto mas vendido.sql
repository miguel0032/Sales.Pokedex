Use AdventureWorks

 --producto que más ha sido vendido

SELECT TOP 50
    p.ProductID,
    p.Name AS ProductName,
    SUM(sod.OrderQty) AS TotalQuantitySold,
    MAX(soh.OrderDate) AS LastSaleDate
FROM
    AdventureWorks.Production.Product p
JOIN
    AdventureWorks.Sales.SalesOrderDetail sod ON p.ProductID = sod.ProductID
JOIN
    AdventureWorks.Sales.SalesOrderHeader soh ON sod.SalesOrderID = soh.SalesOrderID
GROUP BY
    p.ProductID,
    p.Name
ORDER BY
    TotalQuantitySold DESC;
