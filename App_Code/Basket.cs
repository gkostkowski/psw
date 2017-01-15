using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

public class Basket : System.Web.UI.Page
{
    private static Dictionary<int, Tuple<string, double>> basket 
        = new Dictionary<int, Tuple<string, double>>();
    private Basket()
    {

    }
    public static Dictionary<int, Tuple<string, double>> GetBasket()
    {
        return basket;
    }
    public static Tuple<string, double> GetItem(int i)
    {
        if (i <basket.Count)
            return basket[i];
        return null;
    }

    public static void AddItem(string auto, double koszt) 
    {
        basket.Add(basket.Count, new Tuple<string, double>(auto, koszt));
    }
    public static void RemoveItem(int index)
    {
        if (index < basket.Count)
            basket.Remove(index);
    }
    public static int GetCount()
    {
        return basket.Count;
    }

    public static void Clear()
    {
        basket.Clear();
    }
}
