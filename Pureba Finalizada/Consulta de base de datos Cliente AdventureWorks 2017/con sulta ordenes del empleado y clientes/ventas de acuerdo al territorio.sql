use AdventureWorks


 --ventas de acuerdo al territorio


SELECT
    soh.SalesOrderID,
    st.Name AS TerritoryName,
    SUM(sod.LineTotal) AS TotalPorTerritorio
FROM
    AdventureWorks.Sales.SalesOrderHeader soh
JOIN
    AdventureWorks.Sales.SalesOrderDetail sod ON soh.SalesOrderID = sod.SalesOrderID
JOIN
    AdventureWorks.Sales.SalesTerritoryHistory sth ON soh.TerritoryID = sth.TerritoryID
JOIN
    AdventureWorks.Sales.SalesTerritory st ON sth.TerritoryID = st.TerritoryID
GROUP BY
    soh.SalesOrderID,
    st.Name
ORDER BY
    soh.SalesOrderID;
