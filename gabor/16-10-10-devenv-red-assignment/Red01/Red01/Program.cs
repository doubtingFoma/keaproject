using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Red01
{
    class Program
    {
        static void Main(string[] args)
        {
            // Create new customer
            Customer cust1 = new Customer("Gabor", DateTime.Now, "gabor@gabor.gabor");

            // Output info about customer
            cust1.Info();

            // Create an account, add 5000 and 500 then substract 1000.
            // Result should be 4500.
            cust1.CreateAccount();
            cust1.DepositToAccount(5000, 0);
            cust1.DepositToAccount(500, 0);
            cust1.WithrawFromAccount(1000, 0);
            cust1.ListAccount(0);

            // Create an accound, add 5000, substract 6000, then add 500.
            // Result should be 5500.
            cust1.CreateAccount();
            cust1.DepositToAccount(5000, 1);
            cust1.WithrawFromAccount(6000,1 );
            cust1.DepositToAccount(500, 1);
            cust1.ListAccount(1);

            // List all accounts
            cust1.ListAccounts();

            // Output info about customer again
            cust1.Info();
        }
    }
}
