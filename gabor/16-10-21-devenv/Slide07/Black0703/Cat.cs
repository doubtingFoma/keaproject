using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Black0703
{
    class Cat : IPredator
    {
        // Properties
        public int AttackSpeed { get; set; }

        // Constructor
        public Cat(int attackSpeed)
        {
            this.AttackSpeed = attackSpeed;
        }

        // Methods
        public void Attack(IPrey prey)
        {
            Console.WriteLine($"{this.GetType().Name} trying to catch {prey.GetType().Name} ");
            // Attack attempt
            if (this.AttackSpeed > prey.FleeSpeed)
            {
                Console.WriteLine($"{this.GetType().Name} catched {prey.GetType().Name}");
            } else
            {
                prey.Flee();
            }
        }
    }
}
