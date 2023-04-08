import { Spinner } from '@chakra-ui/react';

type props = {
  size: string;
};

export const MainSpinner = (props: props) => {
  const { size } = props;
  return (
    <>
      <Spinner size={size} />
    </>
  );
};
