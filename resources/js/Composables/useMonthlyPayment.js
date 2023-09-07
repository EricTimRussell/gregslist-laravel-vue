import { computed, isRef } from 'vue'
export const useMonthlyPayment = (total, interestRate, duration) => {
  const monthlyPayment = computed(() => {

    const principal = isRef(total) ? total.value : total
    const monthlyInterest = (isRef(interestRate) ? interestRate.value : interestRate) / 100 / 12
    const numberOfPaymentMonths = (isRef(duration) ? duration.value : duration) * 12

    const x = Math.pow(1 + monthlyInterest, numberOfPaymentMonths);
    let monthly = (principal * x * monthlyInterest) / (x - 1)

    return monthly

  })

  const totalPaid = computed(() => {
    return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value
  })

  const totalInterest = computed(() => totalPaid.value - (isRef(total) ? total.value : total))

  return { monthlyPayment, totalPaid, totalInterest }
}