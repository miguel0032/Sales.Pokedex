use AdventureWorks

--consulta que muestre la sumatoria de ventas de cada empleado por año

SELECT
    p.BusinessEntityID,
    CONCAT(p.FirstName, ' ', ISNULL(p.MiddleName, ''), ' ', p.LastName) AS EmployeeName,
    YEAR(sq.QuotaDate) AS Year,
    SUM(sq.SalesQuota) AS TotalSales
FROM
    AdventureWorks.Sales.SalesPersonQuotaHistory sq
JOIN
    AdventureWorks.Person.Person p ON sq.BusinessEntityID = p.BusinessEntityID
GROUP BY
    p.BusinessEntityID,
    p.FirstName,
    p.MiddleName,
    p.LastName,
    YEAR(sq.QuotaDate)
ORDER BY
    p.BusinessEntityID,
    YEAR(sq.QuotaDate);
