using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0502
{
    class Program
    {
        static void Main(string[] args)
        {
            Customer cust1 = new Customer();
            cust1.name = "Gabor";
            Customer cust2 = new Customer();
            cust2.name = "Martin";
            Customer cust3 = new Customer();
            cust3.name = "Joel";

            List<Customer> customerList = new List<Customer>();

            customerList.Add(cust1);
            customerList.Add(cust2);
            customerList.Add(cust3);

            for (int i = 0; i < customerList.Count; i++)
            {
                customerList[i].Buy();
            }


        }
    }
}
