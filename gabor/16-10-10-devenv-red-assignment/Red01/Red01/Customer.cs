using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Red01
{
    class Customer
    {
        // Private props
        private int CustomerId { get; set; }
        private List<Account> Accounts { get; set; }

        // Public props
        public string Name { get; set; }
        public DateTime DOB { get; set; }
        public string Email { get; set; }
        public DateTime SignupDate { get; set; }

        // Constructor with signupdate
        public Customer(string name, DateTime dob, string email, DateTime signupdate)
        {
            CustomerInit(name, dob, email, signupdate);
        }

        // Constructor without signupdate
        public Customer(string name, DateTime dob, string email)
        {
            CustomerInit(name, dob, email, DateTime.Now);
        }

        // Initialize object
        public void CustomerInit(string name, DateTime dob, string email, DateTime signupdate)
        {
            this.CustomerId = new Random().Next(10000);
            this.Accounts = new List<Account>();
            this.Name = name;
            this.DOB = dob;
            this.Email = email;
            this.SignupDate = signupdate;
        }

        // Outputs public information about the customer
        public void Info()
        {
            Console.WriteLine();
            Console.WriteLine("------------------------------");
            Console.WriteLine($"Customer info for this customer: {this.Name}");
            Console.WriteLine($"Customer date of birth: {this.DOB}");
            Console.WriteLine($"E-mail address: {this.Email}");
            Console.WriteLine($"Signup date: {this.SignupDate}");
        }

        public void CreateAccount()
        {
            Customer.Account myAccount = new Account(this.CustomerId);
            this.Accounts.Add(myAccount);

        }

        public void DepositToAccount(decimal amount, int accountIndex)
        {
            this.Accounts[accountIndex].Deposit(amount);
        }

        public void WithrawFromAccount(decimal amount, int accountIndex)
        {
            this.Accounts[accountIndex].Withraw(amount);
        }

        public void ListAccounts()
        {
            for (int i = 0; i < this.Accounts.Count; i++)
            {
                this.Accounts[i].Info();
            }
        }

        public void ListAccount(int accountIndex)
        {
            this.Accounts[accountIndex].Info();
        }

        class Account
        {
            public string AccountId { get; set; }
            private decimal Balance { get; set; }
            private int CustomerId { get; set; }

            public Account(int customerId)
            {
                // Constructor
                // Assign given value to property
                //Console.WriteLine("An account has been created");
                this.AccountId = Guid.NewGuid().ToString();
                this.CustomerId = customerId;
                // this.Balance = 0;

            }

            public void Deposit(decimal amount)
            {
                // Make deposit
                this.Balance += amount;
            }

            public bool Withraw(decimal amount)
            {
                // If desired amount is smaller or equal to current balance,
                // customer can withraw.
                bool canWithraw = amount <= this.Balance;
                this.Balance = canWithraw ? this.Balance - amount : this.Balance;
                return canWithraw;
            }

            public void Info()
            {
                // Print out info
                Console.WriteLine();
                Console.WriteLine("------------------------------");
                Console.WriteLine($"Account info:");
                Console.WriteLine($"Account ID: {this.AccountId}");
                Console.WriteLine($"account balance: {this.Balance}");
                Console.WriteLine($"customer id: {this.CustomerId}");
            }
        }
    }
}
