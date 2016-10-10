using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0501
{
    class Program
    {
        static void Main(string[] args)
        {
            Customer cust1 = new Customer();
            Customer cust2 = new Customer();
            Customer cust3 = new Customer();

            cust1.username = "Gabor";
            cust2.username = "Martin";
            cust3.username = "Joel";

            Console.WriteLine(cust1.username);
            Console.WriteLine(cust2.username);
            Console.WriteLine(cust3.username);

        }
    }
}
